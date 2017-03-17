
@if( ! $companies->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('company::company_admin.order') }}</td>
            <th style='width:30%'>{{ trans('company::company_admin.company_name') }}</th>
            <th style="width:30%">{{ trans('company::company_admin.company_address') }}</th>
            <th style='width:20%'>{{ trans('company::company_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $companies->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($companies as $company)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $company->company_name !!}</td>
            <td>{!! $company->company_address !!}</td>
            <td>
                <a href="{!! URL::route('admin_company.edit', ['id' => $company->company_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_company.delete',['id' =>  $company->company_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
	<h5>
		{{ trans('company::company_admin.message_find_failed') }}
	</h5>
 </span>
@endif
<div class="paginator">
    {!! $companies->appends($request->except(['page']) )->render() !!}
</div>