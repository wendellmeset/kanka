@include('partials.errors')
@include('partials.ads.top')


<div class="entity-grid flex flex-col gap-5">
    @include('entities.components.header', [
        'model' => $model ?? $entity->child,
        'entity' => $entity,
        'breadcrumb' => [
            Breadcrumb::entity($entity)->list(),
        ]
    ])

    <div class="entity-body flex flex-col md:flex-row gap-5 px-4">
        @include('entities.components.menu_v2', [
            'active' => $active,
            'model' => $model ?? $entity->child,
        ])

        <div class="entity-main-block grow flex flex-col gap-5">
            @includeIf($view)
        </div>
    </div>
</div>
