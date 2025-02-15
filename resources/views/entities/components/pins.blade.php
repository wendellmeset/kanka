@php
/** @var \App\Models\MiscModel $model */
$forceShow = false;
if (method_exists($model, 'pinnedMembers') && !$model->pinnedMembers->isEmpty()) {
    $forceShow = true;
}
if (auth()->check() && auth()->user()->can('update', $model)) {
    $forceShow = true;
}
@endphp
<div class="entity-sidebar relative grid grid-cols-2 md:flex md:flex-col gap-5 items-stretch md:w-48 flex-none">

    @if ($forceShow || $model->entity->hasPins())
        @ads('profile')
        <div class="col-span-2">
            <div class="vm-placement" data-id="{{ config('tracking.venatus.profile') }}"></div>
        </div>
        @endads
        <div class="col-span-2 sidebar-section-box entity-pins overflow-hidden flex flex-col gap-2 {{ $model->entity->hasPins() ? '' : 'entity-empty-pin' }}">
            <div class="sidebar-section-title cursor-pointer text-lg user-select border-b element-toggle flex items-center gap-2" data-animate="collapse" data-target="#sidebar-pinned-elements">
                <x-icon class="fa-solid fa-chevron-up icon-show"></x-icon>
                <x-icon class="fa-solid fa-chevron-down icon-hide"></x-icon>

                <span class="grow">{{ __('entities/pins.title') }}</span>

                <a href="https://docs.kanka.io/en/latest/features/profile-sidebar.html" target="_blank" aria-label="{{ __('crud.helpers.learn_more', ['documentation' => __('footer.documentation')]) }}" data-toggle="tooltip" data-title="{{ __('crud.helpers.learn_more', ['documentation' => __('footer.documentation')]) }}">
                    <x-icon class="fa-solid fa-question-circle"></x-icon>
                </a>
            </div>
            <div class="sidebar-elements grid overflow-hidden" id="sidebar-pinned-elements">
                <div class="pins flex flex-col gap-2">
                    @includeWhen(!$model->entity->pinnedFiles->isEmpty() || !$model->entity->pinnedAliases->isEmpty(), 'entities.components.assets')
                    @include('entities.components.relations')
                    @includeWhen(method_exists($model, 'pinnedMembers') && !$model->pinnedMembers->isEmpty(), 'entities.components.members')
                    @includeWhen($model->entity->accessAttributes(), 'entities.components.attributes')
                </div>
            </div>
        </div>
    @endif

    @includeIf('entities.components.profile.' . $name)

    @includeWhen(!isset($printing) && $campaign->boosted() && $model->entity->hasLinks(), 'entities.components.links')

    @include('entities.components.history')
</div>
