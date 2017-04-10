@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: {{ trans('company::company_admin.page_edit') }}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                       {!! !empty($company->company_id) ? '<i class="fa fa-pencil"></i>'.trans('company::company_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('company::company_admin.form_add') !!}
                    </h3>
                </div>
                {{-- model general errors from the form --}}
                @if($errors->has('company_name') )
                <div class="alert alert-danger">{!! $errors->first('company_name') !!}</div>
                @endif

                @if($errors->has('name_unvalid_length') )
                <div class="alert alert-danger">{!! $errors->first('name_unvalid_length') !!}</div>
                @endif

                {{-- successful message --}}
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success">{{$message}}</div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h4>{!! trans('company::company_admin.form_heading') !!}</h4>
                            {!! Form::open(['route'=>['admin_company.post', 'id' => @$company->company_id],  'files'=>true, 'method' => 'post'])  !!}



                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#home">
                                        {!! trans('company::company_admin.tab_overview') !!}
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#menu1">
                                        {!! trans('company::company_admin.tab_attributes') !!}
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">

                                <!--TEMPLATE OVERVIEW-->
                                <div id="home" class="tab-pane fade in active">
                                    <!-- SAMPLE NAME TEXT-->
                                    <!-- COMPANY NAME TEXT-->
                                    @include('company::company.elements.text', ['name' => 'company_name'])
                                    <!-- /END COMPANY NAME TEXT -->
                                    <!-- COMPANY ADDRESS TEXT-->
                                    @include('company::company.elements.text', ['name' => 'company_address'])
                                    <!-- /END COMPANY ADDRESS TEXT -->
                                    <!-- COMPANY LOCATION SELECT-->
                                    @include('company::company.elements.select', ['name' => 'company_location'])
                                    <!-- /END COMPANY LOCATION SELECT -->
                                    <!-- COMPANY DESCRIPTION TEXT-->
                                 
                                    @include('company::company.elements.text-area', ['name' => 'company_description'])
                                    <!-- /END COMPANY DESCRIPTION TEXT -->
                                    <!-- /END SAMPLE NAME TEXT -->
                                </div>

                                <!--TEMPLATE ATTRIBUTES-->
                                <div id="menu1" class="tab-pane fade">
                                    <!-- SAMPLE CATEGORIES TEXT-->
                                    @include('company::company.elements.text', ['name' => 'attributes'])
                                    <!-- /END SAMPLE CATEGORIES TEXT-->
                                </div>

                            </div>





                            {!! Form::hidden('id',@$company->company_id) !!}

                            <!-- DELETE BUTTON -->
                            <a href="{!! URL::route('admin_company.delete',['id' => @$company->company_id, '_token' => csrf_token()]) !!}"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                Delete
                            </a>
                            <!-- DELETE BUTTON -->

                            <!-- SAVE BUTTON -->
                            {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
                            <!-- /SAVE BUTTON -->

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-md-4'>
            @include('company::company.admin.company_search')
        </div>

    </div>
</div>
@stop