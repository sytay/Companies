
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('company::company_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_company','method' => 'get']) !!}

        <!--TITLE-->
        <div class="form-group">
            {!! Form::label('company_name', trans('company::company_admin.company_name_label')) !!}
            {!! Form::text('company_name', @$params['company_name'], ['class' => 'form-control', 'placeholder' => trans('company::company_admin.company_name_placeholder')]) !!}
        </div>
        <!--/END TITLE-->

        {!! Form::submit(trans('company::company_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>


