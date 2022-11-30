<?php

namespace App\Jobs;

use App\Models\Campaign;
use App\Services\Campaign\DuplicateService;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DuplicateCampaign implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $campaignId;
    protected int $userId;

    protected array $options;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Campaign $campaign, User $user, array $options)
    {
        $this->campaignId = $campaign->id;
        $this->userId = $user->id;
        $this->options = $options;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /** @var DuplicateService $service */
        $service = app()->make(DuplicateService::class);

        /** @var Campaign|null $campaign */
        $campaign = Campaign::find($this->campaignId);
        if (!$campaign) {
            Log::warning('Unknown campaign ID ' . $this->campaignId);
        }
        /** @var User|null $user */
        $user = User::find($this->userId);
        if (!$user) {
            Log::warning('Unknown user ID ' . $this->userId);
        }

        $service
            ->campaign($campaign)
            ->user($user)
            ->options($this->options)
            ->duplicate();
    }
}
