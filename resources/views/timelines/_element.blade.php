<?php
/**
 * @var \App\Models\Timeline $timeline
 * @var \App\Models\TimelineEra $era
 * @var \App\Models\TimelineElement $element
 */
?>
<li id="timeline-element-{{ $element->id }}" class="relative mr-2">
    {!! $element->htmlIcon() !!}

    <div class="timeline-item p-0 relative rounded-sm mt-0 ml-16 mr-4">
        <x-box css="flex gap-2 flex-col p-2 mb-5" :padding="0">
            <div class="timeline-item-head flex gap-2 items-center">
                <h3 class="grow flex gap-2 items-center cursor-pointer element-toggle m-0 {{ $element->collapsed() ? 'animate-collapsed' : null }} text-base" data-animate="collapse" data-target="#timeline-element-body-{{ $element->id }}">
                    <x-icon class="fa-solid fa-chevron-up icon-show"></x-icon>
                    <x-icon class="fa-solid fa-chevron-down icon-hide"></x-icon>
                    {!! $element->htmlName() !!}

                    @if (isset($element->date) || $element->use_event_date && isset($element->entity->event->date))
                        <span class="text-neutral-content text-sm">{{isset($element->entity->event->date) && $element->use_event_date ? $element->entity->event->date : $element->date}}</span>
                    @endif
                    @if($element->entity && $element->entity->is_private)
                        <i class="fa-solid fa-lock" data-title="{{ __('timelines/elements.helpers.entity_is_private') }}" data-toggle="tooltip" aria-hidden="true"></i>
                    @endif
                </h3>
                <div class="flex-none flex items-center gap-2 ">
                    @if (auth()->check()) {!! $element->visibilityIcon('btn-box-tool') !!}@endif

                    @can('update', $timeline)
                        <div class="dropdown inline">
                            <a class="dropdown-toggle btn2 btn-xs btn-ghost" data-toggle="dropdown" aria-expanded="false" data-placement="right" data-tree="escape">
                                <i class="fa-solid fa-ellipsis-v" aria-hidden="true"></i>
                                <span class="sr-only">{{__('crud.actions.actions') }}'</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li>
                                    <a href="{{ route('timelines.timeline_elements.edit', [$campaign, $timeline, $element, 'from' => 'view']) }}" title="{{ __('crud.edit') }}"
                                    >
                                        <x-icon class="edit"></x-icon> {{ __('crud.edit') }}
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#" class="text-error"
                                       data-toggle="dialog"
                                       data-target="primary-dialog"
                                       data-url="{{ route('confirm-delete', [$campaign, 'route' => route('timelines.timeline_elements.destroy', [$campaign, $timeline, $element, 'from' => 'view']), 'name' => $element->elementName(), 'permanent' => true]) }}"
                                       title="{{ __('crud.remove') }}">
                                        <x-icon class="trash"></x-icon> {{ __('crud.remove') }}
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" data-title="[timeline:{{ $timeline->entity->id }}|anchor:timeline-element-{{ $element->id }}]" data-toggle="tooltip"
                                       data-clipboard="[timeline:{{ $timeline->entity->id }}|anchor:timeline-element-{{ $element->id }}]" data-toast="{{ __('timelines/elements.copy_mention.success') }}">
                                        <i class="fa-solid fa-link" aria-hidden="true"></i> {{ __('entities/notes.copy_mention.copy') }}
                                    </a>
                                </li>
                                @php $mentionName = $element->mentionName() @endphp
                                <li>
                                    <a href="#" data-title="[timeline:{{ $timeline->entity->id }}|anchor:timeline-element-{{ $element->id }}]|{{ $mentionName }}" data-toggle="tooltip"
                                       data-clipboard="[timeline:{{ $timeline->entity->id }}|anchor:timeline-element-{{ $element->id }}|{{ $mentionName }}]" data-toast="{{ __('timelines/elements.copy_mention.success') }}">
                                        <i class="fa-solid fa-link" aria-hidden="true"></i> {{ __('timelines/elements.copy_mention.copy_with_name') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endcan
                </div>
            </div>
            <div class="timeline-item-body entity-content overflow-hidden @if ($element->collapsed()) hidden @endif" id="timeline-element-body-{{ $element->id }}">
                {!! \App\Facades\Mentions::mapAny($element) !!}

                @if ($element->use_entity_entry && $element->entity && $element->entity->child->hasEntry())
                    <div class="timeline-entity-content">
                        {!! $element->entity->child->entry() !!}
                    </div>
                @endif
            </div>
        </x-box>
        {!! Form::hidden('element_ids[]', $element->id) !!}
    </div>
</li>
