<?php

namespace App\Console\Commands;

use App\Models\Campaign;
use App\Services\Campaign\DuplicateService;
use App\User;
use Illuminate\Console\Command;

class DuplicateCampaign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaign:duplicate {campaign}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Duplicate a campaign';

    protected DuplicateService $service;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $campaignID = $this->argument('campaign');
        /** @var Campaign|null $campaign */
        $campaign = Campaign::find($campaignID);
        if (empty($campaign)) {
            $this->error('Invalid campaign id ' . $campaignID);
            return 0;
        }

        $this->info('Start duplicating at ' . date('H:i:s'));

        $this->service = app()->make(DuplicateService::class);

        $this->service
            ->campaign($campaign)
            ->user(User::find(1))
            ->options(['name' => 'duplicating command line'])
            ->duplicate();


        $this->info('Finished duplicating at ' . date('H:i:s'));
        return 0;
    }
}
