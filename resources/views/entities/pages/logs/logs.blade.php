<?php /** @var \App\Models\Entity $entity
 * @var \App\Models\EntityLog $log
 * @var \App\Models\EntityLog[]|\Illuminate\Pagination\LengthAwarePaginator $logs */?>
@extends('layouts.' . (request()->ajax() ? 'ajax' : 'app'), [
    'title' => __('entities/logs.show.title', ['name' => $entity->name]),
    'description' => '',
    'breadcrumbs' => [
        Breadcrumb::entity($entity)->list(),
        Breadcrumb::show(),
    ],
    'centered' => true,
])
@section('content')
    <form class="pagination-ajax-body max-w-2xl">
    @if (request()->ajax())
        <x-dialog.header>{{ $entity->name }}</x-dialog.header>
    @endif
        <article>
            <div class="modal-loading text-center text-xl p-5" style="display: none">
                <x-icon class="load" />
            </div>
            <div class="pagination-ajax-content">
                <table class="table table-hover break-all">
                    <thead>
                        <tr>
                            <th>{{ __('entities/logs.fields.action') }}</th>
                            <th>{{ __('campaigns.members.fields.name') }}</th>
                            <th>{{ __('entities/logs.fields.date') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($logs as $log)
                        @if ($log->action < 7 || $log->post)
                            <tr>
                                <td class="break-words">
                                    {{ __('entities/logs.actions.' . $log->actionCode(), ['post' => $log->post?->name]) }}
                                </td>
                                <td class="">@if ($log->user)
                                        {!! link_to_route('users.profile', $log->user->name, $log->user, ['target' => '_blank']) !!}
                                    @else
                                        {{  __('crud.history.unknown') }}
                                    @endif

                                    @if ($log->impersonator)
                                        ({{ __('entities/logs.impersonated', ['name' => $log->impersonator->name]) }})
                                    @endif
                                </td>
                                <td>
                                    <span data-title="{{ $log->created_at }} UTC" data-toggle="tooltip" class="text-xs">
                                        {{ $log->created_at->diffForHumans() }}
                                    </span>
                                </td>
                                <td class="text-right">
                                    @if ($campaign->superboosted())
                                        @if(!empty($log->changes))
                                            <a href="#log-{{ $log->id }}" data-animate="collapse">
                                                <i class="fa-solid fa-scroll" aria-hidden="true"></i>
                                                <span class="hidden md:inline">{{ __('entities/logs.actions.view') }}</span>
                                            </a>
                                        @endif
                                    @else
                                    <a href="#log-cta" data-animate="collapse">
                                        <i class="fa-solid fa-scroll" aria-hidden="true"></i>
                                        <span class="hidden md:inline">{{ __('entities/logs.actions.view') }}</span>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @if ($campaign->superboosted() && !empty($log->changes))
                        <tr id="log-{{ $log->id }}" class="hidden">
                            <td colspan="4">
                                <dl class="dl-horizontal">
                                    @foreach ($log->changes as $attribute => $value)
                                        @if (is_array($value)) @continue @endif
                                        <dt>{!! $log->attributeKey($transKey, $attribute) !!}</dt>
                                        <dd class="break-all">{{ $value }}</dd>
                                    @endforeach
                                </dl>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    @if (!$campaign->superboosted())
                    <tr id="log-cta" class="collapse">
                        <td colspan="4">
                                <p class="help-block">{!! __('entities/logs.call-to-action', [
'amount' => config('entities.logs'),
]) !!}</p>
                                @subscriber()
                                <a href="{{ route('settings.premium', ['campaign' => $campaign]) }}" class="btn2 bg-boost text-white">
                                    {!! __('settings/premium.actions.unlock', ['campaign' => $campaign->name]) !!}
                                </a>
                            @else
                                <a href="{{ \App\Facades\Domain::toFront('premium')  }}" class="btn2 bg-boost text-white">
                                    {!! __('callouts.premium.learn-more') !!}
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endif
                    </tbody>
                </table>

                @if (!request()->ajax())
                    {{ $logs->onEachSide(0)->links() }}
                @endif
            </div>
        </article>

        @if (request()->ajax() && $logs->hasPages())
            <footer class="bg-base-200 flex flex-wrap gap-3 justify-between items-start p-3 pagination-ajax-links">
                {{ $logs->onEachSide(0)->links() }}
            </footer>
        @endif
    </form>
@endsection
