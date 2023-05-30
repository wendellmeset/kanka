<header class="masthead masthead-b">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 my-auto landing-heading lg-text-center">
                <h1 class="">{{ __('front.master.heading') }}</h1>
            </div>
            <div class="col-lg-7">
                <div class="header-content text-left text-lg-center">
                    <p class="mb-5">{{ __('front.master.description', ['kanka' => config('app.name')]) }}</p>
                    @if (config('auth.register_enabled'))
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                            {{ __('front.second_block.call_to_action') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <div class="youtube-placeholder" data-yt-url="https://www.youtube.com/embed/ZWVf7JAWKPg">
                    <div class="youtube-placeholder" data-yt-url="https://www.youtube.com/embed/ZWVf7JAWKPg">
                        <img src="{{ Img::crop(445, 253)->new()->url('app/front/play-youtube.jpg') }}" async loading="lazy" class="play-youtube-video" alt="Youtube video" title="What is Kanka?" width="445" height="253" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</header>
