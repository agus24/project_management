@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col s12">
    	<div class="card">
    		<div class="card-content">
	    		<span class="card-title">
	    			<h4>{{ $project->name }}</h4>
	    			<hr/>
	    		</span>
    			<p>{{ $project->description }}</p>
    		</div>
    	</div>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">
					<h4>{{ $task->name }}</h4>
					<hr/>
				</span>
				<table class="table bordered stripped">
					<tr>
						<td>
							<b>Point</b>
						</td><td>
							{{ $task->poin }}
						</td>
					</tr>
					<tr>
						<td>
							<b>Start Date</b>
						</td><td>
							{{ $task->start_date }}
						</td>
					</tr>
					<tr>
						<td>
							<b>End Date</b>
						</td><td>
							<span style="{{ ($task->end_date < Carbon\Carbon::now()) ? "Color:red" : '' }}">
								{{ $task->end_date }}
							</span>
						</td>
					</tr>
					<tr>
						<td>
							<b>Priority</b>
						</td><td>
						<div class="chip {{ ($task->priority == 3) ? "green" : (($task->priority == 2) ? "yellow darken-1" : "red") }}" style="color:white">
							{{ $priority_name }}
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<b>Type Task</b>
						</td><td>
							{{ $type_task_name }}
						</td>
					</tr>
					<tr>
						<td>
							<b>Status</b>
						</td><td>
							{{ ($task->status == 1) ? "Done" : "Not Yet Done" }}
						</td>
					</tr>
					<tr>
						<td>
							<b>User Assigned</b>
						</td>
						<td>
							@foreach($users as $key => $user)
							@if($key != 0)
								{{ ',' }}
							@endif
								&nbsp;{{ $user->name }}
							@endforeach
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
