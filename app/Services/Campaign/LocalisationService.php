<?php

namespace App\Services\Campaign;

use App\Models\Campaign;

/**
 * Use this facade to get the current campaign ID when needed.
 * To keep the code clean, avoid this, as it's available in every controller and on every model as a
 * campaign_id property.
 */
class LocalisationService
{
    /** @var Campaign|null The current campaign contact */
    protected Campaign|null $campaign;

    /** @var int console campaign id */
    protected int $consoleCampaignId = 0;

    public function hasCampaign(): bool
    {
        $campaign = request()->route('campaign');
        return !empty($campaign) && $campaign instanceof Campaign;
    }

    /**
     * Get the campaign
     */
    public function getCampaign(): ?Campaign
    {
        if (isset($this->campaign)) {
            return $this->campaign;
        }

        // Load the campaign from the router
        return $this->campaign = request()->route('campaign');
    }

    /**
     * Force the campaign. This is use for moving entities between campaigns.
     */
    public function forceCampaign(Campaign $campaign): void
    {
        $this->campaign = $campaign;
    }

    /**
     */
    public function getConsoleCampaign(): int
    {
        return $this->consoleCampaignId;
    }

    /**
     * @return $this
     */
    public function setConsoleCampaign(int $campaignId): self
    {
        $this->consoleCampaignId = $campaignId;
        return $this;
    }
}
