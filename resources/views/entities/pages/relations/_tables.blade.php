<?php /** @var \App\Models\Entity $entity
 * @var \App\Models\Relation $relation
 */?>
<h3 class="">
    {{ __('sidebar.relations') }}
</h3>
<x-box css="box-entity-relations box-entity-relations-table" id="entity-relations-table" :padding="$rows->count() === 0">
    @if ($rows->count() === 0)
        <p class="help-block">
            {{ __('entities/relations.helpers.no_relations') }}
        </p>
        @can('relation', [$entity->child, 'add'])
            <a href="{{ route('entities.relations.create', [$campaign, $entity, 'mode' => $mode]) }}" class="btn2 btn-sm btn-accent" data-toggle="dialog" data-target="connection-dialog" data-url="{{ route('entities.relations.create', [$campaign, $entity, 'mode' => $mode]) }}">
                <x-icon class="plus"></x-icon>
                <span class="hidden md:inline">
                {{ __('entities.relation') }}
            </span>
            </a>
        @endcan
    @else
        <div id="datagrid-parent" class="table-responsive">
            @include('layouts.datagrid._table')
        </div>
    @endif
</x-box>

@includeWhen(!$connections->isEmpty(), 'entities.pages.relations._connections')

@section('modals')
    @parent
    <x-dialog id="edit-dialog" :loading="true" />
    @include('layouts.datagrid.delete-forms', ['models' => Datagrid::deleteForms(), 'params' => []])
@endsection

@section('scripts')
    @vite('resources/js/relations.js')
@endsection

@section('styles')
    @vite('resources/sass/relations.scss')
@endsection
