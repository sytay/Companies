
@if( ! $locations->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('company::location_admin.order') }}</td>
            <th style='width:45%'>Location name</th>
         
            <th style='width:20%'>{{ trans('company::location_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $locations->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($locations as $location)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $location->location_name !!}</td>
            <td>
                <a href="{!! URL::route('admin_location.edit', ['id' => $location->location_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_location.delete',['id' =>  $location->location_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
	<h5>
		{{ trans('company::location_admin.message_find_failed') }}
	</h5>
 </span>
@endif
<div class="paginator">
    {!! $locations->appends($request->except(['page']) )->render() !!}
</div>