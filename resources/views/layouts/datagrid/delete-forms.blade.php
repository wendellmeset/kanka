@if (!request()->ajax())<div id="datagrid-delete-forms">@endif
@foreach($models as $model)
    {!! Form::open(['method' => 'DELETE','route' => [$model->url('destroy'), $model], 'style '=> 'display:inline', 'id' => 'delete-form-' . $model->id]) !!}
    {!! Form::close() !!}
@endforeach
@if (!request()->ajax())</div>@endif
