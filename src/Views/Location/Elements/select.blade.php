<div class="form-group">
    <?php 
    if($location_parent == null){
        $location_parent = ['Unparent'];
    }
        if(!isset($location->location_alias)){
            $current_location = 0;
        } else {
            $current_location = $location->location_alias;
        }
    ?>
    {!! Form::label($name, trans('company::location_admin.'.$name).':') !!}
    {!! Form::select($name, $location_parent, $current_location, ['class' => 'form-control']); !!}
</div>