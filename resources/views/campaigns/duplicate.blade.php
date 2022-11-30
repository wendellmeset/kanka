@extends('layouts.app', [
    'title' => __('campaigns/duplicate.title', ['campaign' => $campaign->name]),
    'breadcrumbs' => [
        ['url' => route('campaigns.index'), 'label' => __('entities.campaign')],
        __('campaigns.show.tabs.duplicate')
    ],
    'canonical' => true,
])

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-3">
            @include('campaigns._menu', ['active' => 'duplicate'])
        </div>
        <div class="col-md-9">
            <h3 class="mt-0">
                <button class="btn btn-sm btn-default pull-right" data-toggle="dialog"
                        data-target="export-help">
                    <i class="fa-solid fa-question-circle" aria-hidden="true"></i>
                    {{ __('campaigns.members.actions.help') }}
                </button>

                {{ __('campaigns/duplicate.title', ['campaign' => $campaign->name]) }}
            </h3>

            @can('duplicate', auth()->user())
                <form method="POST" action="{{ route('duplicate-campaign.queue') }}">
                    @csrf

                    <button type="submit" class="btn btn-primary">
                        {{ __('campaigns/duplicate.actions.duplicate') }}
                    </button>
                </form>
            @else
                <div class="alert alert-warning">
                    {{ __('campaigns/duplicate.errors') }}
                </div>
            @endif
        </div>
    </div>
@endsection
