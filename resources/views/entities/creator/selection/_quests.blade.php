<div class="option flex">

    @include('entities.creator.selection._main', [
        'singular' => 'quest',
        'plural' => 'quests',
        'icon' => 'ra ra-wooden-sign',
        'id' => config('entities.ids.quest'),
    ])
    @include('entities.creator.selection._full', ['key' => 'quests'])
</div>
