@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="page-title">Create New Project</div>
    </div>
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"></span><br>
                <div class="bakal-inputan">
                <form action="{{ url('project/new') }}" method="POST">
                	{{ csrf_field() }}
	                <div class="row">
	                    <div class="input-field col s12">
	                        <input placeholder="" name="name" id="name" type="text" class="validate {{ $errors->has('name') ? ' invalid' : '' }}">
	                        <label for="name" data-error="{{ $errors->first('name') }}">Project Name</label>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="input-field col s12">
	                        {{-- <input placeholder="" name="description" type="text" class="validate {{ $errors->has('password') ? ' invalid' : '' }}"> --}}
	                        <textarea name="description" id="description" class="materialize-textarea validate {{ $errors->has('description') ? ' invalid' : '' }}" length="255"></textarea>
	                        <label for="description" data-error="{{ $errors->first('description') }}">Description</label>
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
</div>
@endsection