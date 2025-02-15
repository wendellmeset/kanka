@inject('entityService', 'App\Services\EntityService')
<?php
$entityTypes = ['' => '', 'any' => __('menu_links.random_types.any')];
$entities = $entityService->campaign($campaign)->getEnabledEntitiesSorted(false);
$entityTypes = array_merge($entityTypes, $entities);
?>
<p class="help-block">{!! __('menu_links.helpers.random', [
]) !!}</p>

<x-grid>
    <x-forms.field field="random-type" :label="__('menu_links.fields.random_type')">
        {!! Form::select('random_entity_type', $entityTypes, FormCopy::field('random_entity_type')->string(), ['class' => '']) !!}
    </x-forms.field>

    <input type="hidden" name="save_tags" value="1" />
    <x-forms.tags
        :campaign="$campaign"
        :model="$model ?? null">
    </x-forms.tags>
</x-grid>
