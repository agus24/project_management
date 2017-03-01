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
				</thead>
				<tbody>
				@foreach($project as $key => $value)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ $value->user_name }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection