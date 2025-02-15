<?php

namespace App\Services\Caches;

use App\Models\Campaign;
use App\Services\Caches\Traits\Campaign\ApplicationCache;
use App\Services\Caches\Traits\Campaign\DashboardCache;
use App\Services\Caches\Traits\Campaign\MemberCache;
use App\Services\Caches\Traits\Campaign\RoleCache;
use App\Services\Caches\Traits\Campaign\SettingCache;
use App\Services\Caches\Traits\Campaign\StyleCache;
use App\Services\Caches\Traits\Campaign\ThemeCache;
use App\Services\Caches\Traits\Campaign\ThumbnailCache;
use App\Services\Caches\Traits\PrimaryCache;
use App\Traits\CampaignAware;
use App\Traits\UserAware;

/**
 * Class CampaignCacheService
 * @package App\Services\Caches
 */
class CampaignCacheService extends BaseCache
{
    use ApplicationCache;
    use CampaignAware;
    use DashboardCache;
    use MemberCache;
    use PrimaryCache;
    use RoleCache;
    use SettingCache;
    use StyleCache;
    use ThemeCache;
    use ThumbnailCache;
    use UserAware;

    /**
     * Count the number of entities in a campaign, skipping the permission engine.
     */
    public function entityCount(): int
    {
        $key = 'campaign_' . $this->campaign->id . '_entity_count';
        if ($this->has($key)) {
            return $this->get($key);
        }

        // @phpstan-ignore-next-line
        $data = $this->campaign->entities()->withInvisible()->count();

        $this->put($key, $data, 6 * 3600);
        return $data;
    }

    /**
     * Get the public campaign systems and cache them for a day
     */
    public function systems(): array
    {
        $key = 'campaign_public_systems';
        if ($this->has($key)) {
            return $this->get($key);
        }

        $data = Campaign::selectRaw('system, count(*) as cpt')
            ->public()
            ->whereNotNull('system')
            ->groupBy('system')
            ->orderBy('system')
            ->get();

        $data = $data->where('cpt', '>=', 5)->pluck('system', 'system')->toArray();

        $this->put($key, $data, 24 * 3600);
        return $data;
    }

    protected function primaryData(): array
    {
        return [
            'modules' => $this->formatSettings(),
            'dashboards' => $this->formatDashboards(),
            'members' => $this->formatMembers(),
            'admin-role' => $this->formatAdminRole(),
            'applications' => $this->formatApplications(),
            'time' => time(),
        ];
    }

    protected function primaryKey(): string
    {
        return 'campaign_' . $this->campaign->id;
    }
}
