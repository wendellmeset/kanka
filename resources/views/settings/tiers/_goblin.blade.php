    <div class="flex gap-2 items-center mb-5">
        <div class="flex-0">
            <img class="img-circle w-24 h-24" src="{{ Img::crop(96)->new()->url('app/tiers/goblin-750.png') }}" alt="Goblin">
        </div>
        <div class="grow">
            <h3>Goblin</h3>
            <h5>{{ auth()->user()->currencySymbol() }}3 / {{ __('front.pricing.tier.month') }}</h5>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-3 w-fit mb-5">

        <div class="">{{ __('front.features.patreon.upload_limit') }}</div>
        <div class="">8 mb</div>

        <div class="">{{ __('front.features.patreon.upload_limit_map') }}</div>
        <div class="">10 mb</div>

        <div class="">{!! __('front.features.patreon.discord', ['discord' => link_to(config('social.discord'), 'Discord', ['target' => '_blank'])]) !!}</div>
        <div class=""><x-icon class="fa-solid fa-check-circle" /></div>

        <div class="">{{ __('front.features.patreon.default_image') }}</div>
        <div class=""><x-icon class="fa-solid fa-check-circle" /></div>

        <div class="">{!! __('front.features.patreon.hall_of_fame', ['link' => link_to('https://kanka.io/hall-of-fame', __('front/hall-of-fame.title'))]) !!}</div>
        <div class=""><x-icon class="fa-solid fa-check-circle" /></div>

        <div class="">{{ __('front.features.patreon.api_calls') }}</div>
        <div class=""><x-icon class="fa-solid fa-check-circle" /></div>

        <div class="">{{ __('front.features.patreon.pagination') }}</div>
        <div class=""><x-icon class="fa-solid fa-check-circle" /></div>

        <div class="">{{ __('front.features.patreon.monthly_vote') }}</div>
        <div class=""><x-icon class="fa-solid fa-check-circle" /></div>

        <div class="">{{ __('front.features.patreon.boosts') }}</div>
        <div class="">1</div>
    </div>

