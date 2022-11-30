<?php

namespace App\Http\Controllers\Campaign;

use App\Facades\CampaignLocalization;
use App\Http\Controllers\Controller;
use App\Http\Requests\DuplicateCampaign;
use App\Services\Campaign\DuplicateService;

class DuplicateController extends Controller
{
    protected DuplicateService $service;

    public function __construct(DuplicateService $duplicateService)
    {
        $this->middleware(['auth']);
        $this->service = $duplicateService;
    }

    public function index()
    {
        $campaign = CampaignLocalization::getCampaign();
        $this->authorize('duplicate', $campaign);

        return view('campaigns.duplicate')
            ->with('campaign', $campaign);
    }

    public function queue(DuplicateCampaign $request)
    {
        $campaign = CampaignLocalization::getCampaign();
        $this->authorize('duplicate', $campaign);
        $this->authorize('duplicate', auth()->user());

        $this->service
            ->campaign($campaign)
            ->user(auth()->user())
            ->options($request->only('name'))
            ->queue();

        return redirect()->route('duplicate-campaign')
            ->with('success', __('campaigns/duplicate.success.queued', ['campaign' => $campaign->name]));
    }
}
