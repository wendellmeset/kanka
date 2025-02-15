<div class="flex gap-2 mb-2 items-center align-center">
    <div class="flex-0">
        @include ('partials.boost_icon')
    </div>
    <div>
        <p class="">{{ __('callouts.premium.limitation') }}</p>

        @subscriber()
        <a href="{{ route('settings.premium', ['campaign' => $campaign]) }}" class="btn2 bg-boost text-white btn-sm" target="_blank">
            {!! __('settings/premium.actions.unlock', ['campaign' => $campaign->name]) !!}
        </a>
        @else
            <a href="{{ \App\Facades\Domain::toFront('premium') }}" target="_blank" class="btn2 bg-boost text-white btn-sm">
                {!! __('callouts.premium.learn-more') !!}
            </a>
        @endif
    </div>
</div>
