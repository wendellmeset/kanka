<?php

namespace App\Jobs;

use App\Models\CampaignBoost;
use App\Models\Pledge;
use App\Models\UserLog;
use App\Notifications\Header;
use App\Services\DiscordService;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Role;

class SubscriptionEndJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /** @var int  */
    public $userId;

    /** @var bool */
    public $cancelled;

    public function __construct(User $user, bool $cancelled = false)
    {
        $this->userId = $user->id;
        $this->cancelled = $cancelled;
    }

    /**
     * A user has ended their subscription, either by cancelling or automatically by the script.
     * Let's send them a notification, update their discord roles, send an email, and update their user status
     */
    public function handle()
    {
        /** @var User|null $user */
        $user = User::find($this->userId);
        if (empty($user) || $this->userId == 27078) {
            // User deleted their account already.
            return;
        }

        // Cleanup the user
        $user->pledge = null;
        $settings = $user->settings;
        unset($settings['grandfathered_boost']);
        $user->settings = $settings;
        $user->saveQuietly();

        // Cleanup the campaign boosts
        $boostService = app()->make('App\Services\CampaignBoostService');
        $unboostedCampaigns = [];
        /** @var CampaignBoost $boost */
        foreach ($user->boosts()->with(['campaign'])->get() as $boost) {
            $boostService
                ->campaign($boost->campaign)
                ->unboost($boost);
            if (!in_array($unboostedCampaigns, $boost->campaign_id)) {
                $boost->user->log(UserLog::TYPE_CAMPAIGN_UNBOOST_AUTO);
                $unboostedCampaigns[] = $boost->campaign_id;
            }
        }

        // Cleanup the subscriber role
        /** @var Role $role */
        $role = Role::where('name', Pledge::ROLE)->first();
        $user->roles()->detach($role->id);

        // Notify the user in app about the change
        $user->notify(
            new Header(
                'subscriptions.' . ($this->cancelled ? 'failed' : 'ended'),
                'fa-solid fa-credit-card',
                'orange'
            )
        );

        // Lastly, cleanup any discord stuff
        /** @var DiscordService $discord */
        $discord = app()->make('App\Services\DiscordService');
        $discord->user($user)->removeRoles();
    }
}
