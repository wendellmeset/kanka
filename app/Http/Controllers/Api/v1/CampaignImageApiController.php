<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Campaigns\GalleryImageStore;
use App\Http\Requests\Campaigns\GalleryImageUpdate;
use App\Models\Campaign;
use App\Models\Image;
use App\Http\Resources\ImageResource as Resource;
use App\Services\Campaign\GalleryService;
use Illuminate\Support\Arr;

class CampaignImageApiController extends ApiController
{
    protected GalleryService $service;

    public function __construct(GalleryService $galleryService)
    {
        $this->middleware('campaign.superboosted');
        $this->service = $galleryService;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Campaign $campaign)
    {
        $this->authorize('access', $campaign);
        return Resource::collection(
            $campaign
                ->images()
                ->where('is_default', false)
                ->defaultOrder()
                ->lastSync(request()->get('lastSync'))
                ->paginate()
        );
    }

    /**
     * @return Resource
     */
    public function show(Campaign $campaign, Image $image)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $campaign);
        return new Resource($image);
    }

    /**
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(GalleryImageStore $request, Campaign $campaign)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $campaign);
        if (empty($request->file('file'))) {
            return abort(422);
        }
        $images = $this->service
            ->campaign($campaign)
            ->store($request);
        return new Resource(Arr::first($images));
    }

    /**
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(GalleryImageUpdate $request, Campaign $campaign, Image $image)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $campaign);
        $image->update($request->only('name', 'folder_id'));

        return new Resource($image);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Campaign $campaign, Image $image)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $campaign);
        $image->delete();

        return response()->json(null, 204);
    }
}
