<div class="option flex">

    @include('entities.creator.selection._main', [
        'singular' => 'tag',
        'plural' => 'tags',
        'icon' => 'fa-solid fa-tags',
        'id' => config('entities.ids.tag'),
    ])
    @include('entities.creator.selection._full', ['key' => 'tags'])
</div>
