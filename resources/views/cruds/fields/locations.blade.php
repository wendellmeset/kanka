@if (!$campaignService->enabled('families'))
    <?php return ?>
@endif

<input type="hidden" name="save_locations" value="1">
<div class="form-group">
    @include('components.form.locations', ['options' => [
        'model' => $model ?? FormCopy::model(),
        'source' => $source ?? null
    ]])
</div>
