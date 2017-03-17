<!-- SITE LIST -->
<div class="form-group">
    <?php
    if (empty($locations)) {
        $locations[0] = "Empty Location";
    }
    $current_location = 0;
    if(!empty($company)){
        $current_location = $company->company_location;
    }
    ?>
    {!! Form::label('company_location', trans('company::company_admin.company_location').':') !!}
    {!! Form::select('company_location', @$locations, @$current_location, ['class' => 'form-control']) !!}

</div>
<!-- /SITE LIST -->