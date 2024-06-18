@extends('layout.app')

@section('title', 'Add Task')

@section('styles')
	<style>
		.error_message {
			color: red;
			font-size: 0, 8rem;
		}

	</style>
	
@endsection

@section('content')
<form method="post" action="{{ route('task.store') }}">
	@csrf
	<div>
		<label for="title">
			Title
		</label>
		<input type="text" name="title" id="title" value="{{ old('title')}}">
		@error('title')
			<p class="error_message">{{ $message }}</p>
		@enderror
	</div>
	<div>
		<label for="description">
			Description
		</label>
		<textarea type="textarea" name="description" id="description" rows="5">{{ old('description')}}</textarea>
		@error('description')
			<p class="error_message">{{ $message }}</p>
		@enderror
	</div>
	<div>
		<label for="log_description">
			Long Description
		</label>
		<textarea type="textarea" name="long_description" id="long_description" rows="10">{{ old('long_description')}}</textarea>
		@error('long_description')
			<p class="error_message">{{ $message }}</p>
		@enderror
	</div>
	<button type="submit">Add Task</button>
</form>



@endsection