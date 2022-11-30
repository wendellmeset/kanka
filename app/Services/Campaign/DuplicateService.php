<?php

namespace App\Services\Campaign;

use App\Jobs\DuplicateCampaign;
use App\Models\CalendarWeather;
use App\Models\Campaign;
use App\Models\CampaignDashboard;
use App\Models\CampaignDashboardWidget;
use App\Models\CampaignRole;
use App\Models\CampaignSetting;
use App\Models\Character;
use App\Models\CharacterFamily;
use App\Models\CharacterOrganisation;
use App\Models\CharacterRace;
use App\Models\CharacterTrait;
use App\Models\Concerns\Nested;
use App\Models\CreatureLocation;
use App\Models\Entity;
use App\Models\Image;
use App\Models\Location;
use App\Models\MenuLink;
use App\Models\MiscModel;
use App\Models\QuestElement;
use App\Models\RaceLocation;
use App\Models\Relation;
use App\Models\TimelineElement;
use App\Models\TimelineEra;
use App\Models\UserLog;
use App\Services\EntityService;
use App\Traits\CampaignAware;
use App\Traits\UserAware;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DuplicateService
{
    use CampaignAware;
    use UserAware;

    protected array $options;

    protected EntityService $entityService;

    protected Campaign $new;

    protected array $entityMapping = [];
    protected array $miscMapping = [];
    protected array $roleMapping = [];
    protected array $imageMapping = [];
    protected array $attributeMapping = [];
    protected array $dashboardMapping = [];

    public function options(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Queue the duplication process to not keep the user waiting for multiple minutes
     * @return void
     */
    public function queue()
    {
        DuplicateCampaign::dispatch(
            $this->campaign,
            $this->user,
            $this->options
        );
        $this->user->log(UserLog::CAMPAIGN_DUPLICATE);
    }

    public function duplicate()
    {
        // Do the heavy lifting
        Log::info('Start duplicating campaign ID ' . $this->campaign->id);

        $this->entityService = app()->make(EntityService::class);

        DB::beginTransaction();
        try {
            $this->duplicateCampaign()
                ->duplicateRoles()
                ->duplicateGallery()
                ->duplicateEntities()
                ->duplicateEntitiesV2()
                ->duplicateRelations()
                ->duplicatePosts()
                ->duplicateTags()
                ->duplicateLocations()
                ->duplicateCharacters()
                ->duplicateMaps()
                ->duplicateAttributes()
                ->duplicateMembers()
                ->duplicateDashboards()
                ->duplicateMenuLinks()
                ->fixTree();
            //DB::commit();
            DB::rollBack();
        } catch (\Exception $e) {
            // Delete all the images that were created so far
            Storage::deleteDirectory('campaign/' . $this->new->id);

            $this->new->delete();

            DB::rollBack();


            // Notify users

            // Notify Kanka team
            throw $e;
        }
    }

    /**
     * First part is pretty easy, duplicate the campaign.
     */
    protected function duplicateCampaign(): self
    {
        $this->log('Dup campaign');
        $this->new = $this->campaign
            ->replicate(['export_path', 'boost_count', 'followers', 'entity_count'])
            ->fill(['name' => Arr::get($this->options, 'name', 'UNKNOWN')]);

        if (!empty($this->new->image)) {
            $this->new->image = $this->copyImage($this->new->image);
        }
        $this->new->saveQuietly();

        // Setting (which modules are active etc)
        $this->log('Dup settings');
        $new = $this->campaign->setting->replicate(['campaign_id']);
        $new->campaign_id = $this->new->id;
        $new->saveQuietly();
        return $this;
    }

    /**
     *
     */
    protected function duplicateRoles(): self
    {
        $this->log('Dup roles');
        foreach ($this->campaign->roles as $role) {
            $new = $role->replicate(['campaign_id']);
            $new->campaign_id = $this->new->id;
            $new->saveQuietly();

            $this->roleMapping[$role->id] = $new->id;
        }

        return $this;
    }

    /**
     * And finally, add all the users and roles
     * @return $this
     */
    protected function duplicateMembers(): self
    {
        $this->log('Dup members v2');
        foreach ($this->campaign->members as $member) {
            $new = $member->replicate(['campaign_id']);
            $new->campaign_id = $this->new->id;
            $new->saveQuietly();
        }
        foreach ($this->campaign->roles as $role) {
            $newRole = CampaignRole::find($this->roleMapping[$role->id]);
            foreach ($role->users as $roleUser) {
                $newUser = $roleUser->replicate(['campaign_role_id']);
                $newUser->campaign_role_id = $newRole->id;
                $newUser->saveQuietly();
            }
        }

        foreach ($this->campaign->members as $member) {
            Cache::forget('user_' . $member->user_id . '_campaigns');
            Cache::forget('user_' . $member->user_id . '_roles');
        }

        // If not duplicating, create base roles and add the user to it
        return $this;
    }

    /**
     * Duplicate all the gallery images, needed for superboosted campaigns
     * @return $this
     */
    protected function duplicateGallery(): self
    {
        $this->log('Dup gallery');
        if (!$this->campaign->superboosted()) {
            return $this;
        }

        $images = $this->campaign->images()->orderBy('folder_id');
        $folderMapping = [];
        foreach ($images as $image) {
            /** @var Image $new */
            $new = $image->replicate(['campaign_id']);
            $new->campaign_id = $this->new->id;

            // Copy the image to the new campaign
            $newPath = str_replace(
                'campaign/' . $this->campaign->id . '/',
                'campaign/' . $this->new->id . '/',
                $image->path
            );
            if (!Storage::exists($newPath)) {
                Storage::copy($image->path, $newPath);
            }

            // Folder
            if (!empty($image->folder_id)) {
                $new->folder_id = $folderMapping[$image->folder_id];
            }
            $new->saveQuietly();

            $this->imageMapping[$image->id] = $new->id;
            $folderMapping[$image->id] = $new->id;
        }
        return $this;
    }

    protected function duplicateEntities(): self
    {
        $except = ['menu_links', 'relations', 'conversations', 'dice_rolls'];
        foreach ($this->entityService->entities($except) as $entity => $className) {
            $this->duplicateMisc($entity);
        }

        return $this;
    }

    protected function duplicateMisc(string $entity): void
    {
        $parents = [];
        $tableName = $parentField = null;
        $relationName = Str::camel($entity);
        $this->log('Dup ' . $relationName);
        /** @var Character[]|MiscModel[]|Nested $miscs */
        $miscs = $this->campaign->{$relationName}()->with('entity')->get();
        foreach ($miscs as $misc) {
            // A model without an entity, skip it, the db is probably bad
            if (empty($misc->entity)) {
                continue;
            }
            $new = $misc->replicate(['campaign_id']);
            $new->campaign_id = $this->new->id;

            // Move images
            if (!empty($misc->image)) {
                $new->image = $this->copyImage($misc->image);
            }
            $new->saveQuietly();

            $this->miscMapping[$misc->getTable()][$misc->id] = $new->id;

            if (method_exists('getParentIdName', $misc) && empty($misc->getParentId())) {
                $parents[$misc->getTable()][] = $misc->getParentId();
                $tableName = $misc->getTable();
                $parentField = $misc->getParentIdName();
            }

            $this->duplicateEntity($misc, $new);
        }

        // Go and update every single parent
        $this->log('Dup parents');
        foreach ($parents as $type) {
            foreach ($type as $parent) {
                $newParent = $this->miscMapping[$type][$parent];
                if (empty($newParent)) {
                    continue;
                }
                DB::statement(
                    'UPDATE ' . $tableName
                    . ' SET ' . $parentField . ' = ' . $newParent
                    . ' WHERE id = ' . $parent . ' AND campaign_id = ' . $this->new->id
                );
            }
        }
    }

    /**
     * Once all the entities are imported, we can start fixing variables
     * @return $this
     */
    protected function duplicateEntitiesV2(): self
    {
        $characters = $this->campaign->characters()->with(['races', 'families', 'organisations'])->get();
        foreach ($characters as $character) {
            foreach ($character->races as $element) {
                $new = new CharacterRace();
                $new->character_id = $this->miscMapping['characters'][$character->id];
                $new->race_id = $this->miscMapping['races'][$element->id];
                $new->saveQuietly();
            }
            foreach ($character->families as $element) {
                $new = new CharacterFamily();
                $new->character_id = $this->miscMapping['characters'][$character->id];
                $new->family_id = $this->miscMapping['families'][$element->id];
                $new->saveQuietly();
            }
            foreach ($character->organisations as $element) {
                $new = new CharacterOrganisation();
                $new->character_id = $this->miscMapping['characters'][$character->id];
                $new->organisation_id = $this->miscMapping['organisations'][$element->id];
                $new->saveQuietly();
            }
        }

        $quests = $this->campaign->quests()->with('elements')->get();
        foreach ($quests as $quest) {
            foreach ($quest->elements as $element) {
                $new = $element->replicate(['quest_id']);
                $new->quest_id = $this->miscMapping['quests'][$quest->id];
                if (!empty($new->entity_id)) {
                    if (!isset($this->entityMapping[$new->entity_id])) {
                        continue;
                    }
                    $new->entity_id = $this->entityMapping[$new->entity_id];
                }
                $new->saveQuietly();
            }
        }

        $timelines = $this->campaign->timelines()->with('eras')->get();
        foreach ($timelines as $timeline) {
            foreach ($timeline->eras as $element) {
                $new = new TimelineEra();
                $new->timeline_id = $this->miscMapping['timelines'][$timeline->id];
                $new->saveQuietly();

                foreach ($element->elements as $sub) {
                    $newEle = $sub->replicate(['timeline_id']);
                    $newEle->timeline_id = $this->miscMapping['timelines'][$element->timeline_id];
                    if (!empty($newEle->entity_id)) {
                        if (!isset($this->entityMapping[$newEle->entity_id])) {
                            continue;
                        }
                        $newEle->entity_id = $this->entityMapping[$newEle->entity_id];
                    }
                    $newEle->saveQuietly();
                }
            }
        }

        $calendars = $this->campaign->calendars()->with('calendarWeather')->get();
        foreach ($calendars as $calendar) {
            foreach ($calendar->calendarWeather as $element) {
                $new = new CalendarWeather();
                $new->calendar_id = $this->miscMapping['calendars'][$element->calendar_id];
                $new->saveQuietly();
            }
        }

        return $this;
    }

    /**
     * Copy images to the campaign folder (instead of everything on the main "entity type" folder
     * @param string $path
     * @return string
     */
    protected function copyImage(string $path): string
    {
        $newPath = 'campaign/' . $this->new->id . '/'
            . str_replace('campaign/' . $this->campaign->id . '/', null, $path);
        if (!Storage::exists($newPath)) {
            Storage::copy($path, $newPath);
        }
        return $newPath;
    }

    protected function duplicateRelations(): self
    {
        $this->log('Dup relations');
        /** @var Relation[] $relations */
        $relations = $this->campaign->entityRelations;
        foreach ($relations as $relation) {
            if (!isset($this->entityMapping[$relation->owner_id]) || !isset($this->entityMapping[$relation->target_id])) {
                continue;
            }
            $new = $relation->replicate([
                'campaign_id',
                'owner_id',
                'target_id'
            ]);
            $new->campaign_id = $this->new->id;
            $new->owner_id = $this->entityMapping[$relation->owner_id];
            $new->target_id = $this->entityMapping[$relation->target_id];
            $new->saveQuietly();
        }
        return $this;
    }

    protected function duplicatePosts(): self
    {
        $this->log('Dup posts');
        $entities = $this->campaign->entities()->select('id')->with(['notes', 'notes.permissions'])->get();
        /** @var Entity $entity */
        foreach ($entities as $entity) {
            foreach ($entity->notes as $note) {
                $new = $note->replicate(['entity_id']);
                $new->entity_id = $this->entityMapping[$note->entity_id];
                $new->saveQuietly();

                // Duplicate permissions
                foreach ($note->permissions as $permission) {
                    $newPerm = $permission->replicate();
                    if (!empty($newPerm->role_id)) {
                        $newPerm->role_id = $this->roleMapping[$newPerm->role_id];
                    }
                    $newPerm->saveQuietly();
                }
            }
        }
        return $this;
    }

    protected function duplicateTags(): self
    {
        $this->log('Dup tags');
        $entities = $this->campaign->entities()->select('id')->with(['entityTags'])->get();
        /** @var Entity $entity */
        foreach ($entities as $entity) {
            foreach ($entity->entityTags as $tag) {
                $new = $tag->replicate(['entity_id', 'tag_id']);
                $new->entity_id = $this->entityMapping[$tag->entity_id];
                $new->tag_id = $this->miscMapping['tags'][$tag->tag_id];
                $new->saveQuietly();
            }
        }
        return $this;
    }

    protected function duplicateLocations(): self
    {
        $locations = $this->campaign->locations()->with(['races', 'creatures'])->get();
        /** @var Location $location */
        foreach ($locations as $location) {
            $newLocId = $this->miscMapping['locations'][$location->id];
            foreach ($location->races as $race) {
                $new = new RaceLocation();
                $new->race_id = $this->miscMapping['races'][$race->id];
                $new->location_id = $newLocId;
                $new->saveQuietly();
            }
            foreach ($location->creatures as $sub) {
                $new = new CreatureLocation();
                $new->creature_id = $this->miscMapping['creatures'][$sub->id];
                $new->location_id = $newLocId;
                $new->saveQuietly();
            }

            // Update location ids
            DB::statement('UPDATE characters SET location_id = ' . $newLocId . ' WHERE location_id = ' . $location->id . ' AND campaign_id = ' . $this->new->id);
            DB::statement('UPDATE events SET location_id = ' . $newLocId . ' WHERE location_id = ' . $location->id . ' AND campaign_id = ' . $this->new->id);
            DB::statement('UPDATE families SET location_id = ' . $newLocId . ' WHERE location_id = ' . $location->id . ' AND campaign_id = ' . $this->new->id);
            DB::statement('UPDATE items SET location_id = ' . $newLocId . ' WHERE location_id = ' . $location->id . ' AND campaign_id = ' . $this->new->id);
            DB::statement('UPDATE journals SET location_id = ' . $newLocId . ' WHERE location_id = ' . $location->id . ' AND campaign_id = ' . $this->new->id);
            DB::statement('UPDATE maps SET location_id = ' . $newLocId . ' WHERE location_id = ' . $location->id . ' AND campaign_id = ' . $this->new->id);
            DB::statement('UPDATE organisations SET location_id = ' . $newLocId . ' WHERE location_id = ' . $location->id . ' AND campaign_id = ' . $this->new->id);
        }
        return $this;
    }

    protected function duplicateCharacters(): self
    {
        $characters = $this->campaign->characters()->with('characterTraits')->get();
        foreach ($characters as $character) {
            $newCharId = $this->miscMapping['characters'][$character->id];
            foreach ($character->characterTraits as $trait) {
                /** @var CharacterTrait $new */
                $new = $trait->replicate(['character_id']);
                $new->character_id = $newCharId;
                $new->saveQuietly();
            }
            DB::statement('UPDATE items SET character_id = ' . $newCharId . ' WHERE character_id = ' . $character->id . ' AND campaign_id = ' . $this->new->id);
            DB::statement('UPDATE journals SET character_id = ' . $newCharId . ' WHERE character_id = ' . $character->id . ' AND campaign_id = ' . $this->new->id);
            DB::statement('UPDATE quests SET character_id = ' . $newCharId . ' WHERE character_id = ' . $character->id . ' AND campaign_id = ' . $this->new->id);
        }
        return $this;
    }

    protected function duplicateMaps(): self
    {
        $maps = $this->campaign->maps()->with(['layers', 'groups', 'markers'])->get();
        foreach ($maps as $map) {
            $mapID = $this->miscMapping['maps'][$map->id];
            foreach ($map->layers as $sub) {
                $new = $sub->replicate(['map_id']);
                $new->map_id = $mapID;
                $new->saveQuietly();
            }
            foreach ($map->groups as $sub) {
                $new = $sub->replicate(['map_id']);
                $new->map_id = $mapID;
                $new->saveQuietly();
            }
            foreach ($map->markers as $sub) {
                $new = $sub->replicate(['map_id']);
                $new->map_id = $mapID;
                if (!empty($new->entity_id)) {
                    $new->entity_id = $this->entityMapping[$new->entity_id];
                }
                $new->saveQuietly();
            }

        }
        return $this;
    }

    protected function duplicateMenuLinks(): self
    {
        $this->log('Dup menu links');
        /** @var MenuLink[] $links */
        $links = $this->campaign->menuLinks;
        foreach ($links as $link) {
            if (!isset($this->entityMapping[$link->entity_id])) {
                continue;
            }
            $new = $link->replicate([
                'campaign_id',
            ]);
            $new->campaign_id = $this->new->id;
            if (!empty($new->entity_id)) {
                $new->entity_id = $this->entityMapping[$new->entity_id];
            }
            if (!empty($new->dashboard_id)) {
                $new->dashboard_id = $this->dashboardMapping[$new->dashboard_id];
            }
            $new->saveQuietly();
        }
        return $this;
    }

    protected function duplicateEntity(MiscModel $misc, MiscModel $new): void
    {
        $entity = $misc->entity->replicate([
            'campaign_id',
            'entity_id'
        ]);
        $entity->campaign_id = $this->new->id;
        $entity->entity_id = $new->id;

        if (!empty($misc->entity->image_uuid)) {
            if (empty($this->imageMapping[$misc->entity->image_uuid])) {
                $entity->image_uuid = null;
            } else {
                $entity->image_uuid = $this->imageMapping[$misc->entity->image_uuid];
            }
        }
        if (!empty($misc->entity->header_uuid)) {
            if (empty($this->imageMapping[$misc->entity->header_uuid])) {
                $entity->header_uuid = null;
            } else {
                $entity->header_uuid = $this->imageMapping[$misc->entity->header_uuid];
            }
        }
        if (!empty($misc->entity->header_image)) {
            $entity->header_image = $this->copyImage($misc->entity->header_image);
        }

        // By saving quietly, we skip all the model observers
        $entity->saveQuietly();

        $this->entityMapping[$misc->entity->id] = $entity->id;

        // Entity permissions
        foreach ($misc->entity->permissions as $permission) {
            $newPerm = $permission->replicate();
            if (!empty($newPerm->campaign_role_id)) {
                $newPerm->campaign_role_id = $this->roleMapping[$newPerm->campaign_role_id];
            }
            $newPerm->save();
        }
    }

    protected function duplicateAttributes(): self
    {
        $this->log('Dup inventories, reminders, attributes');
        $entities = $this->campaign->entities()->select('id')->with(['allAttributes', 'inventories'])->get();
        /** @var Entity $entity */
        foreach ($entities as $entity) {
            foreach ($entity->inventories as $inventory) {
                $new = $inventory->replicate();
                $new->item_id = $this->miscMapping['items'][$inventory->item_id];
                if (!empty($new->entity_id)) {
                    if (!isset($this->entityMapping[$new->entity_id])) {
                        continue;
                    }
                    $new->entity_id = $this->entityMapping[$new->entity_id];
                }
                $new->saveQuietly();
            }

            // Events?

            if ($entity->allAttributes->empty()) {
                continue;
            }

            foreach ($entity->allAttributes as $attribute) {
                $new = $attribute->replicate([
                    'entity_id'
                ]);
                $new->entity_id = $this->entityMapping[$attribute->entity_id];
                $new->saveQuietly();

                $this->attributeMapping[$attribute->id] = $new->id;
            }
        }

        foreach ($entities as $entity) {
            if ($entity->allAttributes->empty()) {
                continue;
            }

            foreach ($entity->allAttributes as $attribute) {
                if (!Str::contains($attribute->value, '{')) {
                    continue;
                }

                $value = preg_replace_callback('`{(\w+):(\d+)}`i', function ($matches) {
                    $data = explode(':', Str::before($matches[1], '|'));
                    if (count($data) < 2) {
                        return $matches[1];
                    }

                    if ($data[0] == 'attribute') {
                        if (!isset($this->attributeMapping[$data[1]])) {
                            return $matches[1];
                        }
                        $attMap = $this->attributeMapping[$data[1]];
                        return 'attribute:' . $attMap;
                    }

                    // Entity mentions
                    if (!isset($this->entityMapping[$data[1]])) {
                        return $matches[1];
                    }

                    return $data[0] . ':' . $this->entityMapping[$data[1]];
                }, $attribute->value);

                DB::statement("UPDATE attributes SET value = '" . $value . "' WHERE id = " . $this->attributeMapping[$attribute->id] . ' LIMIT 1');
            }
        }

        // Now update all attributes with a mention and pray
        return $this;
    }

    /**
     * Duplicate the default dashboard, and extra dashboards if the campaign is boosted
     * @return $this
     */
    protected function duplicateDashboards(): self
    {
        // Default dashboard
        $widgets = CampaignDashboardWidget::onDashboard(null)->get();
        foreach ($widgets as $widget) {
            $new = $widget->replicate(['campaign_id']);
            $new->campaign_id = $this->new->id;
            $new->saveQuietly();
        }

        if (!$this->campaign->boosted()) {
            return $this;
        }

        /** @var CampaignDashboard[] $dashboards */
        $dashboards = $this->campaign->dashboards()->with('widgets')->get();
        foreach ($dashboards as $dashboard) {
            /** @var CampaignDashboard $new */
            $new = $dashboard->replicate(['campaign_id']);
            $new->campaign_id = $this->new->id;
            $new->saveQuietly();
            $this->dashboardMapping[$dashboard->id] = $new->id;

            foreach ($dashboard->widgets as $widget) {
                $wid = $widget->replicate(['dashboard_id']);
                $wid->dashboard_id = $new->id;
                $wid->campaign_id = $this->new->id;
                $wid->saveQuietly();
            }
        }
        return $this;
    }

    protected function fixTree()
    {
        $this->log('Fix tree :shrug:');
    }

    protected function log(string $log)
    {
        echo $log . "\n";
    }
}
