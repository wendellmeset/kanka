<?php /** @var \App\Models\Calendar $model */
$options = [$campaign, $model];
$redirect = [];
if (request()->get('layout') === 'year') {
    $redirect[] = 'layout=year';
}
if (request()->has('year') && is_numeric(request()->has('year'))) {
    $redirect[] = 'year=' . request()->get('year');
}
if (request()->has('month') && is_numeric(request()->has('month'))) {
    $redirect[] = 'month=' . request()->get('month');
}
if (!empty($redirect)) {
    $options['redirect'] = implode("&", $redirect);
}
?>
@section('entity-header-actions-override')
    <div class="header-buttons flex gap-2 items-center justify-end flex-wrap">
        @include('entities.headers.toggle')
        @can('update', $model)
            <a href="{{ route('calendars.edit', $options) }}" class="btn2 btn-primary btn-sm ">
                <x-icon class="pencil"></x-icon>
                <span class="hidden lg:inline">{{ __('crud.edit') }}</span>
            </a>
        @endcan
        @can('post', [$model, 'add'])
            <a href="{{ route('entities.posts.create', [$campaign, $model->entity]) }}" class="btn2 btn-accent btn-sm btn-new-post"
               data-entity-type="post" data-toggle="tooltip" data-title="{{ __('crud.tooltips.new_post') }}">
                <x-icon class="plus" />
                <span class="hidden lg:inline">{{ __('crud.actions.new_post') }}</span>
            </a>
        @endcan
    </div>
@endsection

<div class="entity-grid flex flex-col gap-5">
    @include('entities.components.header', [
        'model' => $model,
        'breadcrumb' => [
            Breadcrumb::entity($model->entity)->list(),
        ],
        'entityHeaderActions' => 'entity-header-actions-override',
    ])

    <div class="entity-body flex flex-col md:flex-row gap-5 px-4">
        @include('entities.components.menu_v2', ['active' => 'story', 'withPins'])

        <div class="entity-main-block grow flex flex-col gap-5">
            @include('entities.components.entry')
            @include('calendars._calendar')
            @includeWhen($model->entity->posts()->count() > 0, 'entities.components.posts')

            @include('entities.pages.logs.history')
        </div>
    </div>
</div>

