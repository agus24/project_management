@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col s12">
    	<div class="card">
    		<div class="card-title" style="margin-left:1px">
    			<b style="font-size:30px">{{ $project->name }}</b>
            </div>
            <div class="card-content">
                <p>{{ $project->description }}</p>
            </div>
            <div>
                <form method="POST" id="form" action="{{ url('project/'.$project->id."/delete") }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <a href="{{ url('project/'.$project->id."/edit") }}"><i class="material-icons small">mode_edit</i></a>
                    <a href="javascript:document.getElementById('form').submit()"><i class="material-icons small">delete</i></a>
                </form>
            </div>
    	</div>
	</div>
</div>
<div class="row">
    <div class="col s12">
        <div class="page-title">Task List</div>
    </div>
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
            @if(Auth::user()->id == $project->pic)
            <a href="{{ url('project'."/".$project->id."/addTask") }}" class="waves-effect waves-light btn teal">Add new Task</a>
            @endif
            	<table class="table responsive" id="dtbl">
            		<thead>
            			<th>No. </th>
            			<th>Date</th>
            			<th>Name</th>
                        <th>Poin</th>
                        <th>Priority</th>
                        <th>Type Task</th>
                        <th>Description</th>
            			<th>Status</th>
            			<th>#</th>
            		</thead>
            		<tbody>
            			@foreach($tasks->get() as $key => $task)
        				<tr>
        					<td>{{ $key +1 }}.</td>
        					<td>{{ $task->start_date." - ".$task->end_date }}</td>
        					<td>{{ $task->name }}</td>
        					<td>{{ $task->poin }}</td>
                            <td>
                                <div class="chip {{ ($task->priority == 3) ? "green" : (($task->priority == 2) ? "yellow darken-1" : "red") }}" style="color:white">
                                    <span style="">{{ $task->priority_name }}</span>
                                </div>
                            </td>
                            <td>{{ $task->type_task_name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->status == 1 ? "Done" : "Not Yet Done" }}</td>
                            <td>
        						<a class="btn-floating btn-medium waves-effect waves-light green" href="{{ url('project/'.$project->id.'/task')."/".$task->id }}"><i class="material-icons">search</i></a>
        						@if(Auth::user()->id == $project->pic)
        						<a class="waves-effect waves-light btn teal"> Edit</a>
        						<a class="waves-effect waves-light btn red"> Delete</a>
        						@endif
        					</td>
        				</tr>
            			@endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
// $('#dtbl').DataTable();
</script>
@endsection