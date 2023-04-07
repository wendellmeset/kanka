{!! Form::open(['url' => $route, 'method' => 'GET', 'class' => 'flex-0 form-inline datagrid-search inline-block', 'role' => 'form']) !!}
<div class="form-group has-feedback">
    {{ Form::text('search', isset($filterService) ? $filterService->search() : null, ['class' => 'form-control', 'placeholder' => __('crud.search')]) }}
    <i class="fa-solid fa-search form-control-feedback pt-3"></i>
</div>
{!! Form::close() !!}
