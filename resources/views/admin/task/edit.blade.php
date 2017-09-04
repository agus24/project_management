@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col s12">
    	<div class="card">
            <div class="card-content">
                <span class="card-title">
        			<h4>{{ $project->name }}</h4>
                    <p>Add New Task</p>
                    <hr/>
                </span>
    			<form action={{ url('project/')."/".$project->id."/task/".$task->id }} method="POST">
                    {{ csrf_field() }}
    				{{ method_field('patch') }}
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<input placeholder="" name="name" id="name" type="text" class="validate {{ $errors->has('name') ? ' invalid' : '' }}" value="{{ $task->name }}">
	    					<label for="name" data-error="{{ $errors->first('name') }}">Name</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<input type="text" placeholder="" name="start_date" id="start_date" class="datepicker {{ $errors->has('start_date') ? ' invalid' : '' }}" value="{{ $task->start_date }}">
	    					<label for="start_date" data-error="{{ $errors->first('start_date') }}">Start Date</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<input type="text" placeholder="" name="end_date" id="end_date" class="datepicker {{ $errors->has('end_date') ? ' invalid' : '' }}" value="{{$task->end_date}}">
	    					<label for="end_date" data-error="{{ $errors->first('end_date') }}">End Date</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<select class="validate initialized {{ $errors->has('priority') ? ' invalid' : '' }}" name="priority" id="priority">
	    						<option value="null" disabled selected>Choose Your Priority</option>
	    						@foreach($priority as $prior)
                                    @if($prior->value == $task->priority)
                                    <option selected value="{{ $prior->value }}">{{ $prior->text }}</option>
                                    @else
    	    						<option value="{{ $prior->value }}">{{ $prior->text }}</option>
                                    @endif
	    						@endforeach
	    					</select>
	    					<label for="priority" data-error="{{ $errors->first('priority') }}">Priority</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<select class="validate initialized {{ $errors->has('type_task') ? ' invalid' : '' }}" name="type_task" id="type_task">
	    						<option value="null" disabled selected>Choose Your Type Task</option>
	    						@foreach($type_task as $type)
                                    @if($type->value == $task->type_task)
                                    <option selected value="{{ $type->value }}">{{ $type->text }}</option>
                                    @else
    	    						<option value="{{ $type->value }}">{{ $type->text }}</option>
                                    @endif
	    						@endforeach
	    					</select>
	    					<label for="type_task" data-error="{{ $errors->first('type_task') }}">Type Task</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					 <input type="number" name="poin" id="poin" class="validate {{ $errors->has('poin') ? ' invalid' : '' }}" length="255" value="{{ $task->poin }}">
	                        <label for="poin" data-error="{{ $errors->first('poin') }}">Point</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					 <textarea name="description" id="description" class="materialize-textarea validate {{ $errors->has('description') ? ' invalid' : '' }}" length="255">{{ $task->description }}</textarea>
	                        <label for="description" data-error="{{ $errors->first('description') }}">Description</label>
	    				</div>
    				</div>
    				<div class="row">
	    				<div class="col s12 input-field">
	    					<p>User to Assign to this task</p><br>
	    					<select class="select2 js-states browser-default {{ $errors->has('user') ? ' invalid' : '' }}" name="user[]" id="user" multiple="multiple">
	    						@foreach(Auth::user()->get() as $user)
                                    @if(count($users->where('id',$user->id)) > 0)
                                    <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                                    @else
    	    						<option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
	    						@endforeach
	    					</select>
	    				</div>
    				</div>
    				<div class="row">
	                	<input type="submit" class="waves-effect waves-light btn blue m-b-xs" value="submit">
	                </div>
    			</form>
    		</div>
    	</div>
	</div>
</div>
@endsection

@section('script')
<script>

</script>
@endsection
