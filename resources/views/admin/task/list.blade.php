@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col s12">
    	<div class="card">
            <div class="card-content">
        		<span class="card-title">
        			<h4>{{ $project->name }}</h4>
                    <hr/>
                    <p>{{ $project->description }}</p>
                </span>
                <form method="POST" id="form" action="{{ url('project/'.$project->id."/delete") }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <a href="{{ url('project/'.$project->id."/edit") }}" class="btn blue">Edit</a>
                    <a href="javascript:document.getElementById('form').submit()" class="btn red">Delete</a>
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
                                <form id="delForm" action="{{ url('project/'.$project->id.'/task')."/".$task->id."/delete" }}" method="POST">
                                <a class="btn-floating btn-medium waves-effect waves-light green" href="{{ url('project/'.$project->id.'/task')."/".$task->id }}"><i class="material-icons">search</i></a>
                                @if(Auth::user()->id == $project->pic)
                                <a class="waves-effect waves-light btn teal" href="{{ url('project/'.$project->id.'/task')."/".$task->id."/edit" }}"> Edit</a>
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
        						<button class="waves-effect waves-light btn red"> Delete</button>
                                @endif
                                </form>
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
