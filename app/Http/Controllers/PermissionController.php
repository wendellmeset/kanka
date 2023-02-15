<?php

namespace App\Http\Controllers;

use App\Facades\CampaignLocalization;
use App\Http\Requests\StorePermission;
use App\Models\Entity;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    /**
     * @var PermissionService
     */
    protected $permissionService;

    /**
     * PermissionController constructor.
     * @param PermissionService $permissionService
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * @param Entity $entity
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Entity $entity)
    {
        $this->authorize('permission', $entity->child);
        $campaign = CampaignLocalization::getCampaign();

        return view('cruds.permissions', compact('campaign', 'entity'));
    }

    /**
     * @param StorePermission $request
     * @param Entity $entity
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StorePermission $request, Entity $entity)
    {
        $this->authorize('permission', $entity->child);

        $this->permissionService->saveEntity($request->only('role', 'user'), $entity);

        return redirect()->back()
            ->with('success_raw', __('crud.permissions.success'));
    }
}
