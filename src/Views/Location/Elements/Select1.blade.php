<!-- SITE LIST -->
<div class="form-group">
    <?php $location_name = $request->get('location_name') ? $request->get('location_name') : @$location->location_name ?>
    {!! Form::label('location_id', trans('company::location_admin.location_name').':') !!}
    {!! Form::select('location_id', @$categories, @$location->location_id, ['class' => 'form-control']) !!}
</div>
<!-- /SITE LIST -->