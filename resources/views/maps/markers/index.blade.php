<?php /** @var \App\Models\Map $model */?>
@extends('layouts.app', [
    'title' => __('maps/markers.index.title', ['name' => $model->name]),
    'description' => '',
    'breadcrumbs' => false,
    'mainTitle' => false,
    'miscModel' => $model,
])


@section('entity-header-actions')
    @can('update', $model)
        <div class="header-buttons flex gap-2 items-center justify-end flex-wrap">
            <a href="https://docs.kanka.io/en/latest/entities/maps/markers.html" class="btn2 btn-sm" target="_blank">
                <x-icon class="question" />
                <span class="hidden lg:inline">{{ __('crud.actions.help') }}</span>
            </a>
            @if ($model->explorable())
                <a href="{{ route('maps.explore', [$campaign, $model]) }}" class="btn2 btn-primary btn-sm">
                    <x-icon class="map" />
                    <span class="hidden lg:inline">{{ __('maps.actions.explore') }}</span>
                </a>
            @endif
        </div>
    @endcan
@endsection

@section('content')
    @include('entities.pages.subpage', [
        'active' => 'markers',
        'breadcrumb' => __('maps.panels.markers'),
        'view' => 'maps.panels.markers',
        'entity' => $model->entity,
    ])
@endsection
