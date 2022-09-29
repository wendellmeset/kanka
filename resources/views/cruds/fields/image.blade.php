<?php
/**
 * Options:
 * bool $imageRequired set to true if the image is required and can't be removed
 */
$formats = 'PNG, JPG, GIF, WebP';
$max = 25;
if (isset($size) && $size == 'map') {
    $formats = 'PNG, JPG, SVG, WebP';
    $max = 50;
}
?>
<div class="@if (!empty($imageRequired) && $imageRequired) required @endif">
<label>{{ __('crud.fields.image') }}</label>
{!! Form::hidden('remove-image') !!}
</div>

<div class="row">
    <div class="{{ empty($model->image) ? 'col-md-12' : 'col-md-10' }}">
        <div class="form-group">
            {!! Form::file('image', array('class' => 'image form-control')) !!}
        </div>
        <div class="form-group">
            @if(empty($source))
                {!! Form::text('image_url', null, ['placeholder' => __('crud.placeholders.image_url'), 'class' => 'form-control']) !!}
            @else
                {!! Form::text('image_url', $source->getOriginalImageUrl(), ['placeholder' => __('crud.placeholders.image_url'), 'class' => 'form-control']) !!}
            @endif
            <p class="help-block">
                {{ __('crud.hints.image_limitations', ['formats' => $formats, 'size' => (isset($size) ? auth()->user()->mapUploadSize(true) : auth()->user()->maxUploadSize(true))]) }}
@php $currentCampaign = \App\Facades\CampaignLocalization::getCampaign(false); @endphp
                @subscriber()
                    @if ($currentCampaign && !$currentCampaign->boosted())
                        <p>
                            <a href="{{ route('settings.boost', ['campaign' => $currentCampaign]) }}">
                                <i class="fa-solid fa-rocket" aria-hidden="true"></i>
                                {!! __('callouts.subscribe.share-booster', ['campaign' => $currentCampaign->name]) !!}
                            </a>
                        </p>
                    @endif
                @else
                    <a href="{{ route('front.pricing') }}">{{ __('callouts.subscribe.pitch-image', ['max' => $max]) }}</a>
                @endif
            </p>
        </div>
    </div>
    @if (!empty($model->image))
    <div class="col-md-2">
        <div class="preview-v2">
            <div class="image" style="background-image: url('{{ $model->getImageUrl(200, 120) }}')" title="{{ $model->name }}">
                @if (empty($imageRequired) || !$imageRequired)
                <a href="#" class="img-delete" data-target="remove-image" title="{{ __('crud.remove') }}">
                    <i class="fa-solid fa-trash"></i> {{ __('crud.remove') }}
                </a>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
