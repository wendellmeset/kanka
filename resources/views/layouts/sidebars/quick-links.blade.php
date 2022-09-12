<li class="{{ $sidebar->active('menu_links') }} sidebar-quick-links">
    @if(auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('menu_links.index') }}">
            <i class="{{ $element['custom_icon'] ?: $element['icon'] }}"></i>
            {{ $element['custom_label'] ?: $element['label'] }}
        </a>
    @else
        <span>
            <i class="{{ $element['custom_icon'] ?: $element['icon'] }}"></i>
            {{ $element['custom_label'] ?: $element['label'] }}
        </span>
    @endif
    <ul class="sidebar-submenu">
        @foreach ($links as $menuLink)
            @if ((!$menuLink->parent || $menuLink->parent === 'menu_links') || ($menuLink->parent && !$currentCampaign->boosted()))
                @include('layouts.sidebars._quick-link',['menuLink' => $menuLink])
            @endif
        @endforeach
    </ul>
</li>
