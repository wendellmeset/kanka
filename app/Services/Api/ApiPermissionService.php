<?php


namespace App\Services\Api;

use App\Models\CampaignPermission;
use App\Models\CampaignRole;
use App\Models\Entity;

use Illuminate\Support\Facades\DB;

class ApiPermissionService
{
     /**
     * Get the permissions of an entity
     * @param Entity $entity
     * @return mixed
     */
    protected function entityPermissions(Entity $entity): array
    {
        if (!empty($this->cachedPermissions)) {
            return $this->cachedPermissions;
        }

        $permissions = ['user' => [], 'role' => []];
        /** @var CampaignPermission $perm */
        foreach (CampaignPermission::where('entity_id', $entity->id)->get() as $perm) {
            $key = (!empty($perm->user_id) ? 'user' : 'role');
            $subkey = (!empty($perm->user_id) ? $perm->user_id : $perm->campaign_role_id);
            $permissions[$key][$subkey][$perm->action] = $perm;
        }

        return $this->cachedPermissions = $permissions;
    }
    /**
     * @param $request
     * @param Entity $entity
     */
    public function saveEntity($request, Entity $entity)
    {
         // First, let's get all the stuff for this entity
        $permissions = $this->entityPermissions($entity);
        $model = [];
        // Next, start looping the data
        foreach ($request->all() as $permission) {
            if (!empty($permission['campaign_role_id'])) {
                $key = 'role';
                $key2 = 'campaign_role_id';
            } else {
                $key = 'user';
                $key2 = 'user_id';
            }
            if (empty($permissions[$key][$permission[$key2]][$permission['action']])) {
                $permission['campaign_id'] = $entity->campaign_id;
                $permission['entity_type_id'] = $entity->type_id;
                $permission['entity_id'] = $entity->id;
                $permission['misc_id'] = $entity->child->id;
                array_push($model, CampaignPermission::create($permission));
            }
        }
        return $model;
    }
}
