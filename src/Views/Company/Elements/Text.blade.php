<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $company_name = $request->get($name) ? $request->get('$name') : @$company->$name ?>
    {!! Form::label($name, trans('company::company_admin.'.$name).':') !!}
    {!! Form::text($name, $company_name, ['class' => 'form-control', 'placeholder' => trans('company::company_admin.'.$name).'']) !!}
</div>
<!-- /SAMPLE NAME -->