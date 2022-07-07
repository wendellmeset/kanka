<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Campaign;
use App\Models\Map;
use App\Http\Requests\StoreMap as Request;
use App\Http\Resources\MapResource as Resource;

class MapApiController extends ApiController
{
    /**
     * @param Campaign $campaign
     * @return Collection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Campaign $campaign)
    {
        $this->authorize('access', $campaign);
        return Resource::collection($campaign
            ->maps()
            ->filter(request()->all())
            ->withApi()
            ->lastSync(request()->get('lastSync'))
            ->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param Map $map
     * @return Resource
     */
    public function show(Campaign $campaign, Map $map)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $map);
        return new Resource($map);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Campaign $campaign)
    {
        $this->authorize('access', $campaign);
        $this->authorize('create', Map::class);
        $this->authorizeNewEntity($campaign);

        $model = Map::create($request->all());
        $this->crudSave($model);
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Map $map
     * @return Resource
     */
    public function update(Request $request, Campaign $campaign, Map $map)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $map);
        $map->update($request->all());
        $this->crudSave($map);

        return new Resource($map);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Map $map
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(\Illuminate\Http\Request $request, Campaign $campaign, Map $map)
    {
        $this->authorize('access', $campaign);
        $this->authorize('delete', $map);
        $map->delete();

        return response()->json(null, 204);
    }
}
