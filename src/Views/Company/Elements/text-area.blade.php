<!-- work NAME -->
<div class="form-group">
    <?php $description = $request->get($name) ? $request->get('$name') : @$company->$name ?>
    {!! Form::label($name, trans('company::company_admin.'.$name).':') !!}
    {!! Form::textarea($name, $description, ['class' => 'form-control my-editor']) !!}
    
</div>
<!-- /work NAME -->