<?php
/**
* @var \App\Models\MiscModel $model
* @var \App\Models\Entity $entity
* @var \App\Models\Post $post
* @var \Illuminate\Database\Eloquent\Collection $pinnedNotes
*/
?>
<div class="flex flex-col gap-2 post-block post-{{ $post->id }} post-position-{{ $post->position }}@if (isset($post->settings['class'])) {{ $post->settings['class'] }}@endif" data-visibility="{{ $post->visibility_id }}" data-position="{{ $post->position }}">
    <div class="flex gap-2 items-center">
        <h3 class="grow" >
            {{ $post->name  }}
            @if (app()->environment('local'))
                <sup class="text-xs">({{ $post->position }})</sup>
            @endif
        </h3>
        <div class="post-buttons flex items-center gap-1 flex-wrap justify-end">
            @if (auth()->check())
                {!! $post->visibilityIcon('') !!}
                <div class="dropdown">
                    <a role="button" class="dropdown-toggle btn2 btn-ghost btn-sm" data-toggle="dropdown" aria-expanded="false" data-placement="right" data-tree="escape">
                        <x-icon class="fa-solid fa-ellipsis-v"></x-icon>
                        <span class="sr-only">{{__('crud.actions.actions') }}'</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        @can('post', [$model, 'edit', $post])
                        <li>
                            <a href="{{ route('entities.posts.edit', [$campaign, 'entity' => $entity, 'post' => $post, 'from' => 'main']) }}" title="{{ __('crud.edit') }}">
                                <x-icon class="edit"></x-icon>
                                {{ __('crud.edit') }}
                            </a>
                        </li>
                        @endcan
                        @if (!isset($more))
                        <li>
                            <a href="#" data-title="[{{ $model->getEntityType() }}:{{ $model->entity->id }}|anchor:post-{{ $post->id }}]" data-toggle="tooltip"
                               data-clipboard="[{{ $model->getEntityType() }}:{{ $model->entity->id }}|anchor:post-{{ $post->id }}]" data-toast="{{ __('entities/notes.copy_mention.success') }}">
                                <x-icon class="fa-solid fa-link"></x-icon>
                                {{ __('entities/notes.copy_mention.copy') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" data-title="[{{ $model->getEntityType() }}:{{ $model->entity->id }}|anchor:post-{{ $post->id }}|{{ $post->name }}]" data-toggle="tooltip"
                               data-clipboard="[{{ $model->getEntityType() }}:{{ $model->entity->id }}|anchor:post-{{ $post->id }}|{{ $post->name }}]" data-toast="{{ __('entities/notes.copy_mention.success') }}">
                                <x-icon class="fa-solid fa-link"></x-icon>
                                {{ __('entities/notes.copy_mention.copy_with_name') }}
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->isAdmin())
                        <li>
                            <a href="{{ route('posts.move', [$campaign, 'entity' => $entity, 'post' => $post, 'from' => 'main']) }}" title="{{ __('crud.edit') }}">
                                <x-icon class="fa-solid fa-arrows-left-right"></x-icon> {{ __('entities/notes.move.move') }}
                            </a>
                        </li>
                        @endif
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('entities.story.reorder', [$campaign, 'entity' => $entity]) }}" title="{{ __('entities/story.reorder.icon_tooltip') }}">
                                <x-icon class="fa-solid fa-arrows-v"></x-icon>
                                {{ __('entities/story.reorder.icon_tooltip') }}
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
{{--            @if($post->layout?->code == 'inventory')--}}
{{--                @include('entities.pages.inventory._buttons', ['isPost' => true, 'entity' => $entity, 'ajax' => null])--}}
{{--            @elseif ($post->layout?->code == 'attributes')--}}
{{--                @include('entities.pages.attributes._buttons', ['isPost' => true])--}}
{{--            @elseif ($post->layout?->code == 'abilities')--}}
{{--                @include('entities.pages.abilities._buttons', ['isPost' => true])--}}
{{--            @elseif ($post->layout?->code == 'assets')--}}
{{--                @include('entities.pages.assets._buttons', ['assets' => $entity->assets, 'isPost' => true])--}}
{{--            @elseif ($post->layout?->code == 'connection_map')--}}
{{--                @include('entities.pages.relations._buttons', ['option' => null, 'isPost' => true, 'mode' => 'map'])--}}
{{--            @elseif ($post->layout?->code == 'character_orgs')--}}
{{--                @include('characters.panels._buttons')--}}
{{--            @elseif ($post->layout?->code == 'quest_elements')--}}
{{--                @include('quests.elements._buttons')--}}
{{--            @endif--}}
        </div>
    </div>

    @if($post->layout?->code == 'inventory')
        @php
            $inventory = $entity
                ->inventories()
                ->with(['entity', 'item', 'item.entity'])
                ->get()
                ->sortBy(function ($model, $key) {
                    return !empty($model->position) ? $model->position : 'zzzz' . $model->itemName();
                });
        @endphp
        @include('entities.pages.inventory._table', ['inventory' => $inventory, 'isPost' => true, 'entity' => $entity, 'ajax' => null])
    @elseif ($post->layout?->code == 'attributes')
        <x-box css="box-entity-attributes">
            @include('entities.pages.attributes.render', ['isPost' => true])
        </x-box>
        <input type="hidden" name="live-attribute-config" data-live="{{ route('entities.attributes.live.edit', [$campaign, $entity]) }}" />
    @elseif ($post->layout?->code == 'abilities')
        @php
        $translations = [
            'all' => __('crud.visibilities.all'),
            'members' => __('crud.visibilities.members'),
            'admin-self' => __('crud.visibilities.admin-self'),
            'admin' => __('crud.visibilities.admin'),
            'self' => __('crud.visibilities.self'),
            'update' => __('crud.update'),
            'remove' => __('crud.remove'),
        ];
        $translations = json_encode($translations);
        @endphp
        @include('entities.pages.abilities._abilities', ['isPost' => true])
    @elseif ($post->layout?->code == 'assets')
        @include('entities.pages.assets._asset', ['assets' => $entity->assets, 'isPost' => true])
    @elseif ($post->layout?->code == 'connection_map')
        @include('entities.pages.relations._map', ['option' => null, 'isPost' => true, 'mode' => 'map'])
    @elseif ($post->layout?->code == 'character_orgs')
        @include('characters.panels.organisations', ['character' => $post->entity->child])
    @elseif ($post->layout?->code == 'quest_elements')
        @php
            $elements = $entity->child
                    ->elements()
                    ->with('entity')
                    ->paginate();
        @endphp
        @include('quests.elements._elements', ['elements' => $elements])
    @elseif ($post->layout?->code == 'location_characters')
        @php
            $options = [$campaign, 'location' => $entity->child];

            Datagrid::layout(\App\Renderers\Layouts\Location\Character::class)
                ->route('locations.characters', $options);

            $rows = $entity->child
                ->allCharacters()
                ->filteredCharacters()
                ->paginate();;

        @endphp
        @include('locations.panels.characters')
    @endif
</div>
