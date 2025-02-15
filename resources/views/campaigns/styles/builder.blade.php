@extends('layouts.' . (request()->ajax() ? 'ajax' : 'app'), [
    'title' => __('campaigns/builder.title') . ' - ' . $campaign->name,
    'breadcrumbs' => [
        ['url' => route('campaign_styles.index', $campaign), 'label' => __('campaigns.show.tabs.styles')],
        __('campaigns/builder.title')
    ],
    'mainTitle' => '',
    'sidebar' => 'campaign',
])

@section('content')

    <div class="max-w-4xl">
        <x-alert type="info">
            <p class="m-0">
                {!! __('campaigns/builder.help', [
                'docs' => link_to('https://docs.kanka.io/en/latest/features/campaigns/theme-builder.html', __('footer.documentation', ['target' => '_blank']))
            ]) !!}
        </x-alert>

        {!! Form::open([
            'route' => ['campaign_styles.builder-save', $campaign],
            'method' => 'POST',
            'data-shortcut' => 1,
            'id' => 'theme-builder',
        ]) !!}

        @include('partials.errors')
        <x-box>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-primary" data-toggle="tooltip" data-title="Click me to change the colour" data-target="p"></div>
                        Primary
                    </div>
                    <div class="flex items-center gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-secondary" data-toggle="tooltip" data-title="Click me to change the colour" data-target="s"></div>
                        Secondary
                    </div>
                    <div class="flex items-center gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-accent" data-toggle="tooltip" data-title="Click me to change the colour" data-target="a"></div>
                        Accent
                    </div>
                    <div class="flex gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-neutral" data-toggle="tooltip" data-title="Click me to change the colour" data-target="n"></div>
                        <div class="break-words">
                            <p class="m-0">Neutral </p>
                            <p class="help-block m-0">Used for tooltips, default tags and calendar weather.</p>
                        </div>
                    </div>
                    <div class="flex gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-base-100" data-toggle="tooltip" data-title="Click me to change the colour" data-target="b"></div>
                        <div class="break-words">
                            <p class="m-0">Content </p>
                            <p class="help-block m-0">Used for menus, boxes, panels, forms. Its contrast is used as the main text colour.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-info" data-toggle="tooltip" data-title="Click me to change the colour" id="picker-info" data-target="in"></div>
                        Information alert
                    </div>
                    <div class="flex items-center gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-success" data-toggle="tooltip" data-title="Click me to change the colour" data-target="su"></div>
                        Success alert
                    </div>
                    <div class="flex items-center gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-warning" data-toggle="tooltip" data-title="Click me to change the colour" data-target="wa"></div>
                        Warning alert
                    </div>
                    <div class="flex items-center gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-error" data-toggle="tooltip" data-title="Click me to change the colour" data-target="er"></div>
                        Error alert
                    </div>
                    <div class="flex items-center gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-wrapper" data-toggle="tooltip" data-title="Click me to change the colour" data-target="w"></div>
                        Main background colour
                    </div>
                    <div class="flex items-center gap-2 mb-5">
                        <div class="picker rounded flex-none h-6 w-6 cursor-pointer border bg-sidebar" data-toggle="tooltip" data-title="Click me to change the colour" data-target="si"></div>
                        Campaign sidebar
                    </div>
                </div>
            </div>

            <div class="mt-5 flex gap-2 md:gap-5">
                <div class="grow">
                    @if (request()->ajax())
                        <button type="button" class="btn2 btn-ghost btn-full" data-dismiss="modal">
                            {{ __('crud.cancel') }}
                        </button>
                    @else
                        <a href="{{ (!empty($cancel) ? $cancel : url()->previous()) }}" class="btn2 btn-ghost">
                            {{ __('crud.cancel') }}
                        </a>
                    @endif

                    @if (!empty($config))
                        <x-button.delete-confirm target="#delete-reset" :text="__('crud.actions.reset')" />
                    @endif
                </div>
                <button class="btn2 btn-primary join-item" id="form-submit-main">
                    {{ __('crud.save') }}
                </button>
            </div>
        </x-box>


        <div class="hidden">
            <textarea id="field-theme" name="config">{!! $config !!}</textarea>
        </div>
        {!! Form::close() !!}

        @if(!empty($config))
            {!! Form::open([
            'method' => 'DELETE',
            'route' => ['campaign_styles.builder-reset', $campaign],
            'id' => 'delete-reset']) !!}
            {!! Form::close() !!}
        @endif

        @include('campaigns.styles._preview')
    </div>
@endsection


@section('scripts')
    @parent
    @vite('resources/js/campaigns/theme-builder.js')
@endsection

@section('styles')
    @parent
    <style>
        .box-default {
            --tw-border-opacity: 1;
            border-color:hsl(var(--b2)/var(--tw-border-opacity));
            --tw-bg-opacity: 1;
            background-color:hsl(var(--b2)/var(--tw-bg-opacity));
            color:hsl(var(--bc)/var(--tw-text-opacity));
        }
        .box-primary {
            --tw-border-opacity: 1;
            border-color:hsl(var(--pf)/var(--tw-border-opacity));
            --tw-bg-opacity: 1;
            background-color:hsl(var(--pf)/var(--tw-bg-opacity));
            color:hsl(var(--pc)/var(--tw-text-opacity));
        }
        .box-accent {
            --tw-border-opacity: 1;
            border-color:hsl(var(--af)/var(--tw-border-opacity));
            --tw-bg-opacity: 1;
            background-color:hsl(var(--af)/var(--tw-bg-opacity));
            color:hsl(var(--ac)/var(--tw-text-opacity));
        }
    </style>
@endsection
