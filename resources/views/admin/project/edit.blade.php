@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-title">
				Edit
			</div>
			<div class="card-content">
				<form method="POST" action="{{ url('project/'.$project->id) }}">
					{{ method_field('PATCH') }}
					{{ csrf_field() }}
					<div class="row">
						<div class="input-field col s12">
							<input placeholder="" name="name" id="name" type="text" class="validate {{ $errors->has('name') ? ' invalid' : '' }}" value="{{ old('name') ? old('name') : $project->name }}">
	                        <label for="name" data-error="{{ $errors->first('name') }}">Project Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea name="description" id="description" class="materialize-textarea validate {{ $errors->has('description') ? ' invalid' : '' }}" placeholder="" length="1000">{{ old('description') ? old('description') : $project->description }}</textarea>
							<label for="" data-error="{{ $errors->first('description') }}" >Description</label>
						</div>
					</div>
					<div class="row">
						<input type="submit" class="waves-effect waves-light btn teal" value="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection