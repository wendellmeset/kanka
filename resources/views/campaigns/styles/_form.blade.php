<x-forms.field
    field="name"
    :required="true"
    :label="__('campaigns/styles.fields.name')">
    {!! Form::text('name', null, ['class' => '']) !!}
</x-forms.field>

<x-forms.field
    field="content"
    :required="true"
    :label="__('campaigns/styles.fields.content')"
    :helper="__('campaigns.helpers.css')">
    {!! Form::textarea('content', null, ['class' => 'codemirror', 'id' => 'css', 'spellcheck' => 'false']) !!}
</x-forms.field>

<x-forms.field field="enabled" :label=" __('campaigns/styles.fields.is_enabled')">
    {!! Form::hidden('is_enabled', 0) !!}
        <label class="text-neutral-content cursor-pointer flex gap-2">
            {!! Form::checkbox('is_enabled', 1, !isset($style) ? true : $style->is_enabled) !!}
            {{ __('campaigns/styles.helpers.is_enabled' )}}
        </label>
    </div>
</x-forms.field>
