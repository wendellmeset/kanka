<?php

namespace App\Http\Controllers\Races;

use App\Facades\Datagrid;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Race;
use App\Traits\CampaignAware;
use App\Traits\Controllers\HasDatagrid;
use App\Traits\Controllers\HasSubview;
use App\Traits\GuestAuthTrait;

class RaceController extends Controller
{
    use CampaignAware;
    use GuestAuthTrait;
    use HasDatagrid;
    use HasSubview;

    public function index(Campaign $campaign, Race $race)
    {
        $this->campaign($campaign)->authView($race);

        $options = ['campaign' => $campaign, 'race' => $race];
        $filters = [];
        if (request()->has('parent_id')) {
            $options['parent_id'] = $race->id;
            $filters['parent_id'] = $race->id;
        }

        Datagrid::layout(\App\Renderers\Layouts\Race\Race::class)
            ->route('races.races', $options);

        // @phpstan-ignore-next-line
        $this->rows = $race
            ->descendants()
            ->sort(request()->only(['o', 'k']), ['name' => 'asc'])
            ->with(['entity', 'characters'])
            ->filter($filters)
            ->paginate(15);

        if (request()->ajax()) {
            return $this->campaign($campaign)->datagridAjax();
        }

        return $this
            ->campaign($campaign)
            ->subview('races.races', $race);
    }
}
