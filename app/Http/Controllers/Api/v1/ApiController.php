<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\MiscModel;

class ApiController extends Controller
{
    /**
     * Hook for MiscModel and Entity objects
     */
    protected function crudSave(MiscModel $model)
    {
        // Fire an event for the Entity Observer.
        $model->crudSaved();

        // MenuLink have no entity attached to them.
        if (!empty($model->entity)) {
            $model->entity->crudSaved();
        }
    }
}
