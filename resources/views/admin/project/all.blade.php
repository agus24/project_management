@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col s12">
		<div class="page-title">
			Project List
		</div>
		<div class="page-content">
			<table>
				<thead>
					<th>No.</th>
					<th>Project Name</th>
					<th>PIC</th>
					<th width="10%">#</th>
				</thead>
				<tbody>
				@foreach($project as $key => $value)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ $value->pic_name }}</td>
						@if($value->pic == Auth::user()->id)
						<td><input type="submit" class="waves-effect waves-light btn blue m-b-xs" value="Edit"></td>
						@endif
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection