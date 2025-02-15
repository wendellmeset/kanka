<x-forms.field
    field="tooltips"
    :label="__('fields.tooltip.name')">
    @if($campaign->boosted())
        <p class="text-neutral-content">
            {{ __('fields.tooltip.description') }}
        </p>

        {!! Form::textarea('entity_tooltip', FormCopy::entity()->field('tooltip')->string(), ['class' => '', 'id' => 'tooltip', 'rows' => 3, 'placeholder' => __('fields.tooltip.description')]) !!}

        <p class="text-neutral-content">
@php
$tooltipTags = [];
foreach (config('purify.configs.tooltips.allowed') as $tag) {
    $tooltipTags[] = '<code>'. $tag . '</code> ';
}
$tooltipTags = implode(', ', $tooltipTags);
            @endphp
            {!! __('fields.tooltip.helper', ['tags' => $tooltipTags]) !!}
        </p>
    @else
        @include('cruds.fields.helpers.boosted', ['key' => 'fields.tooltip.boosted-description'])
    @endif
</x-forms.field>


<x-forms.field
    field="header"
    :label="__('fields.header-image.title')">
    @if($campaign->boosted())
        @php
        $headerUrlPreset = null;
        if (!empty($source) && $source->entity && $source->entity->header_image) {
            $headerUrlPreset = Storage::url($source->entity->header_image);
        }
        @endphp
        <p class="text-neutral-content">{{ __('fields.header-image.description') }}</p>
        {!! Form::hidden('remove-header_image') !!}
        <x-grid type="3/4">
            <div class="flex flex-col gap-2 @if ((!empty($model->entity) && !empty($model->entity->header_image))) col-span-3 @else col-span-4 @endif">
                <x-forms.field field="header-file">
                    {!! Form::file('header_image', array('class' => 'image')) !!}
                </x-forms.field>
                <x-forms.field field="header-url" :helper="__('crud.hints.image_limitations', ['formats' => 'PNG, JPG, GIF, WebP', 'size' => Limit::readable()->upload()]) . ' ' . __('crud.hints.image_recommendation', ['width' => '1200', 'height' => '400'])">
                    {!! Form::text('header_image_url', $headerUrlPreset, ['placeholder' => __('crud.placeholders.image_url'), 'class' => '']) !!}
                </x-forms.field>
            </div>

            @if (!empty($model->entity) && !empty($model->entity->header_image))

                @include('cruds.fields._image_preview', [
                    'image' => $model->entity->thumbnail(120),
                    'title' => $model->name,
                    'target' => 'remove-header_image',
                ])
            @endif

        </x-grid>

        @include('cruds.fields.entity_header')
    @else
        @include('cruds.fields.helpers.boosted', ['key' => 'fields.header-image.boosted-description'])
    @endif
</x-forms.field>
