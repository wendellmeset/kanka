<?php

namespace App\Services;

use App\Models\Campaign;
use App\Models\MenuLink;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Stevebauman\Purify\Facades\Purify;

class SidebarService
{
    protected $rules = [
        'dashboard' => [
            null,
            'dashboard',
        ],
        'campaigns' => [
            'campaign',
            'overview',
            'campaigns',
            'campaign_user',
            'campaign_roles',
            'campaign_invites',
            'recovery',
        ],
        'characters' => [
            'characters',
            'character_relation',
        ],
        'conversations' => [
            'conversations',
            'conversation_messages',
        ],
        'events' => [
            'events',
        ],
        'families' => [
            'families',
            'family_relation',
        ],
        'items' => [
            'items',
        ],
        'journals' => [
            'journals',
        ],
        'locations' => [
            'locations',
        ],
        'maps' => [
            'maps',
        ],
        'notes' => [
            'notes',
        ],
        'organisations' => [
            'organisations',
            'organisation_member',
        ],
        'other' => [
            'releases',
            'team',
        ],
        'quests' => [
            'quests',
        ],
        'calendars' => [
            'calendars',
        ],
        'releases' => [
            'releases'
        ],
        'team' => [
            'team',
        ],
        'attribute_templates' => [
            'attribute_templates',
        ],
        'tags' => [
            'tags'
        ],
        'timelines' => [
            'timelines'
        ],
        'dice_rolls' => [
            'dice_rolls',
        ],
        'menu_links' => [
            'menu_links',
        ],
        'races' => [
            'races',
        ],
        'abilities' => [
            'abilities',
        ],
        'relations' => [
            'relations',
        ],
    ];

    /**
     * Admin menu
     * @var array
     */
    protected $adminRules = [
        'faqs' => [
            'faqs'
        ],
        'users' => [
            'users',
        ],
        'app-releases' => [
            'app-releases',
        ],
        'community-events' => [
            'community-events',
        ],
        'community-votes' => [
            'community-votes',
        ],
        'patrons' => [
            'patrons',
        ],
        'faq' => [
            'faq',
            'faqs',
        ],
        'faq-categories' => [
            'faq-categories',
        ],
        'cache' => [
            'cache',
        ],
        'referrals' => [
            'referrals',
        ],
    ];

    protected $elements = [
        'dashboard' => [
            'icon' => 'fa-solid fa-th-large',
            'label' => 'sidebar.dashboard',
            'module' => false,
            'route' => 'dashboard',
            'fixed' => true,
        ],
        'menu_links' => [
            'icon' => 'fa-solid fa-star',
            'label' => 'entities.menu_links',
            'fixed' => true,
        ],
        'campaigns' => [
            'icon' => 'fa-solid fa-globe',
            'label' => 'sidebar.world',
            'module' => false,
            'route' => 'campaign',
            'fixed' => true,
        ],
        'characters' => [
            'icon' => 'fa-solid fa-user',
            'label' => 'sidebar.characters',
        ],
        'locations' => [
            'icon' => 'ra ra-tower',
            'label' => 'sidebar.locations',
            'tree' => true,
        ],
        'maps' => [
            'icon' => 'fa-solid fa-map',
            'label' => 'entities.maps',
            'tree' => true,
        ],
        'organisations' => [
            'icon' => 'ra ra-hood',
            'label' => 'sidebar.organisations',
            'tree' => true,
        ],
        'families' => [
            'icon' => 'ra ra-double-team',
            'label' => 'sidebar.families',
            'tree' => true,
        ],
        'calendars' => [
            'icon' => 'fa-solid fa-calendar',
            'label' => 'sidebar.calendars',
            'tree' => true,
        ],
        'timelines' => [
            'icon' => 'fa-solid fa-hourglass-half',
            'label' => 'sidebar.timelines',
            'tree' => true,
        ],
        'races' => [
            'icon' => 'ra ra-wyvern',
            'label' => 'sidebar.races',
            'tree' => true,
        ],
        'campaign' => [
            'icon' => 'fa-solid fa-globe',
            'label' => 'sidebar.campaign',
            'route' => 'campaign',
            'fixed' => true,
        ],
        'quests' => [
            'icon' => 'ra ra-wooden-sign',
            'label' => 'sidebar.quests',
            'tree' => true,
        ],
        'journals' => [
            'icon' => 'ra ra-quill-ink',
            'label' => 'sidebar.journals',
            'tree' => true,
        ],
        'items' => [
            'icon' => 'ra ra-gem-pendant',
            'label' => 'sidebar.items',
        ],
        'events' => [
            'icon' => 'fa-solid fa-bolt',
            'label' => 'sidebar.events',
        ],
        'abilities' => [
            'icon' => 'ra ra-fire-symbol',
            'label' => 'sidebar.abilities',
            'tree' => true,
        ],
        'notes' => [
            'icon' => 'fa-solid fa-book-open',
            'label' => 'sidebar.notes',
            'tree' => true,
        ],
        'other' => [
            'icon' => 'fa-solid fa-cubes',
            'label' => 'sidebar.other',
            'module' => false,
            'route' => false,
            'fixed' => true,
        ],
        'tags' => [
            'icon' => 'fa-solid fa-tags',
            'label' => 'sidebar.tags',
            'tree' => true,
        ],
        'conversations' => [
            'icon' => 'fa-solid fa-comment',
            'label' => 'sidebar.conversations',
        ],
        'dice_rolls' => [
            'icon' => 'ra ra-dice-five',
            'label' => 'sidebar.dice_rolls',
        ],
        'relations' => [
            'icon' => 'fa-solid fa-people-arrows',
            'label' => 'sidebar.relations',
            'perm' => 'relations',
            'module' => false,
        ],
        'gallery' => [
            'icon' => 'fa-solid fa-images',
            'label' => 'sidebar.gallery',
            'route' => 'campaign.gallery.index',
            'perm' => 'gallery',
            'module' => false,
        ],
        'attribute_templates' => [
            'icon' => 'fa-solid fa-copy',
            'label' => 'sidebar.attribute_templates',
            'module' => false,
        ],
        /*'search' => [
            'icon' => 'fa fa-search',
            'label' => 'Search...',
            'module' => false,
            'route' => 'search',
        ],*/
    ];

    protected $layout = [
        'dashboard' => null,
        'menu_links' => null,
        'campaigns' => [ //world
            'characters',
            'locations',
            'maps',
            'organisations',
            'families',
            'calendars',
            'timelines',
            'races',
        ],
        'campaign' => [
            'quests',
            'journals',
            'items',
            'events',
            'abilities',
        ],
        'notes' => null,
        'other' => [
            'tags',
            'conversations',
            'dice_rolls',
            'relations',
            'gallery',
            'attribute_templates',
        ],
        //'search' => null,
    ];

    /** @var Campaign */
    protected $campaign;

    /** @var bool */
    protected $withDisabled = false;

    public function campaign(Campaign $campaign): self
    {
        $this->campaign = $campaign;
        return $this;
    }

    public function withDisabled(): self
    {
        $this->withDisabled = true;
        return $this;
    }

    /**
     * @param $menu
     */
    public function active($menu = '', $class = 'active'): string
    {
        if (empty($this->rules[$menu])) {
            return '';
        }

        if (request()->has('quick-link')) {
            return '';
        }

        foreach ($this->rules[$menu] as $rule) {
            if (request()->segment(4) == $rule) {
                return " $class";
            }
        }

        // Entities? It's complicated
        if (request()->segment(4) == 'entities') {
            $entity = request()->route('entity');
            if ($entity->pluralType() == $menu) {
                return " $class";
            }
        }

        return '';
    }

    /**
     * @param MenuLink $menuLink
     * @return string
     */
    public function activeMenuLink(MenuLink $menuLink): string
    {
        $request = request()->get('quick-link');
        if (empty($request) || $request != $menuLink->id) {
            return '';
        }

        return 'active';
    }

    /**
     * Settings menu active
     * @param string $menu
     * @return string
     */
    public function settings(string $menu): string
    {
        $current = request()->segment(3);
        if ($current == $menu) {
            return ' active';
        }
        return '';
    }

    /**
     * @param string $menu
     * @param string $css
     * @return null|string
     */
    public function open($menu = '', $css = 'menu-open')
    {
        if (empty($this->rules[$menu])) {
            return null;
        }

        foreach ($this->rules[$menu] as $rule) {
            if (request()->segment(4) == $rule) {
                return $css;
            }
        }
        return null;
    }

    /**
     * @param $menu
     * @param string $class
     * @return string|null
     */
    public function admin($menu, $class = 'active')
    {
        if (empty($this->adminRules[$menu])) {
            return null;
        }

        foreach ($this->adminRules[$menu] as $rule) {
            if (request()->segment(3) == $rule) {
                return " $class";
            }
        }

        return null;
    }

    /**
     * Generate an array of the sidebar elements
     * @return array
     */
    public function layout(): array
    {
        $key = $this->cacheKey();
        if (!$this->withDisabled && Cache::has($key)) {
            //dump('read from cache ' . $key);
            //return Cache::get($key);
        }
        $layout = [];
        foreach ($this->customLayout() as $name => $children) {
            if (!isset($this->elements[$name])) {
                dd('E601 - cant find element ' . $name);
            }
            $element = $this->customElement($name);
            // Add route if it should have one
            if (!isset($element['route'])) {
                $element['route'] = $name . '.index';
            }

            // No children? Nothing more to do
            if (empty($children)) {
                // If this is a level 0 element like "Notes", the module still needs to be checked
                if (!isset($element['module']) && !$this->withDisabled) {
                    if (!$this->campaign->enabled($name)) {
                        continue;
                    }
                }
                $layout[$name] = $element;
                continue;
            }
            $layout[$name] = $element;
            $layout[$name]['children'] = [];
            foreach ($children as $childName) {
                $child = $this->customElement($childName);
                // Child has a module, check that the campaign has it enabled
                if (!isset($child['module']) && !$this->withDisabled) {
                    if (!$this->campaign->enabled($childName)) {
                        continue;
                    }
                }
                // Child has permission check?
                if (isset($child['perm'])) {
                    if (!auth()->check() || !auth()->user()->can($childName, $this->campaign)) {
                        continue;
                    }
                }

                // Add route when none is set
                if (!isset($child['route'])) {
                    $child['route'] = $childName . '.index';
                }

                // Add it
                $layout[$name]['children'][$childName] = $child;
            }
        }

        Cache::put($key, $layout, 7 * 86400);
        return $layout;
    }

    /**
     * Save the new config into the database, somehow.
     * @param array $data
     */
    public function save(array $data)
    {
        // Prepare the data for the database
        $ui = $this->campaign->ui_settings;

        // First we want to figure out the new "order", and later we can worry about the "overrides".
        $order = [];
        $parent = null;
        foreach ($data['order'] as $field => $value) {
            if (Str::endsWith($field, '_start')) {
                $parent = Str::before($field, '_start');
                $order[$parent] = [];
                continue;
            } elseif (Str::endsWith($field, '_end')) {
                $parent = null;
                continue;
            }

            if (!empty($parent)) {
                $order[$parent][$field] = $field;
            } else {
                $order[$field] = null;
            }
        }

        $ui['sidebar'] = [
            'order' => $order,
        ];

        // Now let's build the config.
        $labels = [];
        $icons = [];

        foreach ($data as $field => $value) {
            if (empty($value)) {
                continue;
            }
            if (Str::endsWith($field, '_label')) {
                $labels[Str::before($field, '_label')] = Purify::clean(strip_tags($value));
                continue;
            }
            elseif (Str::endsWith($field, '_icon')) {
                $icons[Str::before($field, '_icon')] = Purify::clean(strip_tags($value));
                continue;
            }
            // Nothing of value
        }

        // Save the new data to the campaign config
        if (!empty($labels)) {
            $ui['sidebar']['labels'] = $labels;
        } elseif (isset($ui['sidebar']['labels'])) {
            unset($ui['sidebar']['labels']);
        }

        if (!empty($icons)) {
            $ui['sidebar']['icons'] = $icons;
        } elseif (isset($ui['sidebar']['icons'])) {
            unset($ui['sidebar']['icons']);
        }

        $this->campaign->ui_settings = $ui;
        $this->campaign->save();

        Cache::forget($this->cacheKey());
    }

    public function reset()
    {
        $ui = $this->campaign->ui_settings;
        unset($ui['sidebar']);
        $this->campaign->ui_settings = $ui;
        $this->campaign->save();

        Cache::forget($this->cacheKey());
    }

    protected function customLayout(): array
    {
        // Only boosted campaigns can change the layout
        if (!$this->campaign->boosted()) {
            return $this->layout;
        }
        $layout = Arr::get($this->campaign->ui_settings, 'sidebar.order');
        if (empty($layout)) {
            return $this->layout;
        }

        // We have a layout, let's see if anything is missing. There is probably a smarter way to do this.
        $definedElements = [];
        foreach ($layout as $name => $values) {
            $definedElements[] = $name;
            if (!is_array($values)) {
                continue;
            }
            foreach ($values as $key) {
                $definedElements[] = $key;
            }
        }

        // Find missing elements that are in the base layout but not in the custom one
        $missing = array_diff(array_keys($this->elements), $definedElements);

        // Loop through the missing elements and inject them where they are "expected"
        foreach ($missing as $element) {
            $found = false;
            //dump('Missing: ' . $element);
            // If it's a base level, add it there
            if (array_key_exists($element, $this->layout)) {
                $layout[$element] = null;
                continue;
            }
            foreach ($this->layout as $name => $children) {
                if (!is_array($children)) {
                    continue;
                }
                $values = array_values($children);
                //dump(!in_array($element, $values));
                if (!in_array($element, $values)) {
                    continue;
                }
                $layout[$name][$element] = $element;
                //dump('Added it to ' . $name);

                $found = true;
                continue;
            }

            if (!$found) {
                dd('E637: Couldn\'t place sidebar element ' . $element);
            }
        }

        return $layout;
    }

    protected function customElement(string $key): array
    {
        $element = $this->elements[$key];
        $element['custom_label'] = null;
        $element['custom_icon'] = null;
        $element['label'] = __($element['label']);

        if (!$this->campaign->boosted()) {
            return $element;
        }
        $label = Arr::get($this->campaign->ui_settings, 'sidebar.labels.' . $key);
        $icon = Arr::get($this->campaign->ui_settings, 'sidebar.icons.' . $key);
        if (!empty($label)) {
            $element['custom_label'] = $label;
        }
        if (!empty($icon)) {
            $element['custom_icon'] = $icon;
        }

        return $element;
    }

    /**
     * @return string
     */
    protected function cacheKey(): string
    {
        return 'campaign_' . $this->campaign->id . '_sidebar';
    }

    /**
     * Available parents for placing a quick link
     * @return array
     */
    public function availableParents(): array
    {
        $labels = [];
        foreach ($this->elements as $key => $element) {
            $labels[$key] = __($element['label']);
        }
        return $labels;
    }
}
