@php
    $plural = \App\Facades\Module::plural(config('entities.ids.creature'), __('entities.creatures'));
@endphp
@extends('layouts.app', [
    'title' => $model->name . ' - ' . $plural,
    'breadcrumbs' => false,
    'mainTitle' => false,
    'miscModel' => $model,
])


@section('entity-header-actions')
    <div class="header-buttons flex gap-2 items-center justify-end flex-wrap">
        @if (request()->has('parent_id'))
            <a href="{{ route('creatures.creatures', [$campaign, $model]) }}" class="btn2 btn-sm">
                <x-icon class="filter" />
                <span class="hidden lg:inline">{{ __('crud.filters.all') }}</span>
                ({{ $model->descendants()->count() }})
            </a>
        @else
            <a href="{{ route('creatures.creatures', [$campaign, $model, 'parent_id' => $model->id]) }}" class="btn2 btn-sm">
                <x-icon class="filter" />
                <span class="hidden lg:inline">{{ __('crud.filters.direct') }}</span>
                ({{ $model->creatures()->count() }})
            </a>
        @endif
    </div>
@endsection

@section('content')
    @include('entities.pages.subpage', [
        'active' => 'creatures',
        'breadcrumb' => $plural,
        'view' => 'creatures.panels.creatures',
        'entity' => $model->entity,
    ])
@endsection
