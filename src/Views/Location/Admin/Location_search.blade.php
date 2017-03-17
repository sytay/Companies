
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('company::location_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_location','method' => 'get']) !!}

        <!--TITLE-->
        <div class="form-group">
            {!! Form::label('location_name', trans('company::location_admin.location_name_label')) !!}
            {!! Form::text('location_name', @$params['location_name'], ['class' => 'form-control', 'placeholder' => trans('company::location_admin.location_name_placeholder')]) !!}
        </div>
        <!--/END TITLE-->

        {!! Form::submit(trans('company::location_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>


