<?php
/**
 * @var \App\Models\Organisation $model
 */
$allMembers = false;
$datagridOptions = [
    $campaign,
    $model,
    'init' => 1
];
if (request()->has('all')) {
    $datagridOptions['all'] = 1;
    $allMembers = true;
}
$datagridOptions = Datagrid::initOptions($datagridOptions);

$datagridCall = ['datagridUrl' => route('organisations.members', $datagridOptions)];
if (!empty($rows)) {
    $datagridCall = [];
}
$direct = $model->members()->has('character')->count();
$all = $model->allMembers()->has('character')->count();
?>
<div class="flex gap-2 items-center mb-2">
    <h3 class="grow">
        {{ __('organisations.fields.members') }}
    </h3>
    <div class="flex gap-2 flex-wrap overflow-auto">
        @if (!$allMembers)
            <a href="{{ route('organisations.show', [$campaign, $model, 'all' => true, '#organisation-members']) }}" class="btn2 btn-sm">
                <i class="fa-solid fa-filter"></i>
                <span class="hidden xl:inline">
                    {{ __('crud.filters.lists.desktop.all', ['count' => $all]) }}
                </span>
                <span class="xl:hidden">
                    {{ $all }}
                </span>
            </a>
        @else
            <a href="{{ route('organisations.show', [$campaign, $model, '#organisation-members']) }}" class="btn2 btn-sm">
                <i class="fa-solid fa-filter"></i>

                <span class="hidden xl:inline">
                    {{ __('crud.filters.lists.desktop.filtered', ['count' => $direct]) }}
                </span>
                <span class="xl:inline">
                    {{ $direct  }}
                </span>
            </a>
        @endif

        @can('member', $model)
            <a href="{{ route('organisations.organisation_members.create', [$campaign, 'organisation' => $model->id]) }}" class="btn2 btn-primary btn-sm"
               data-toggle="dialog" data-target="primary-dialog" data-url="{{ route('organisations.organisation_members.create', [$campaign, $model->id]) }}">
                <x-icon class="plus"></x-icon>
                <span class="hidden lg:inline">
                    {{ __('organisations.members.actions.add') }}
                </span>
            </a>
        @endcan
    </div>
</div>
<div id="organisation-members">
    @if ($direct === 0 && !$allMembers)
        <x-box>
            <p class="help-block">
                {{ __('organisations.members.helpers.' . ($allMembers ? 'all_' : null) . 'members') }}
            </p>
        </x-box>
    @else
        <div id="datagrid-parent" class="table-responsive">
            @include('layouts.datagrid._table', $datagridCall)
        </div>
    @endif

</div>

@section('modals')
    @parent
    <div id="datagrid-delete-forms"></div>
@endsection
