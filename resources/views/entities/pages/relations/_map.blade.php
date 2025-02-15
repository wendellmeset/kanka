<?php /** @var \App\Models\Entity $entity
 * @var \App\Models\Relation $relation
 */

$options = [
    '' => __('entities/relations.options.relations'),
    'only_relations' => __('entities/relations.options.only_relations'),
    'related' => __('entities/relations.options.related'),
    'mentions' => __('entities/relations.options.mentions'),
];

?>
@if(!$campaign->boosted())
    <x-cta :campaign="$campaign">
        <p>{{ __('entities/relations.call-to-action') }}</p>
    </x-cta>
    <?php return ?>
@endif

{!! Form::open([
    'route' => ['entities.relations.index', $campaign, $entity],
    'method' => 'GET',
]) !!}
    <div class="join w-full">
        {!! Form::select('option', $options, $option, ['class' => ' join-item']) !!}
        <input type="submit" value="{{ __('entities/relations.options.show') }}" class="btn2 btn-primary btn-sm join-item" />
    </div>
{!! Form::hidden('mode', 'map') !!}
{!! Form::close() !!}

<x-box css="box box-solid box-entity-relations box-entity-relations-explorer">
    <div class="loading text-center text-xg" id="spinner">
        <x-icon class="load" />
    </div>
    <div id="cy" class="cy" style="display: none;" data-url="{{ route('entities.relations_map', [$campaign, $entity, 'option' => $option]) }}"></div>
</x-box>

@section('scripts')
    @parent
    @vite('resources/js/relations.js')
@endsection

@section('styles')
    @parent
    @vite('resources/sass/relations.scss')
@endsection
