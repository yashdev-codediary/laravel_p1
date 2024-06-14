@extends('layout.app')

@section('title', 'Add Task')

@section('content')
{{ $errors }}
<form method="post" action="{{ route('task.store') }}">
	@csrf
	<div>
		<label for="title">
			Title
		</label>
		<input type="text" name="title" id="title">
	</div>
	<div>
		<label for="description">
			Description
		</label>
		<textarea type="textarea" name="description" id="description" rows="5"></textarea>
	</div>
	<div>
		<label for="log_description">
			Long Description
		</label>
		<textarea type="textarea" name="log_description" id="log_description" rows="10"></textarea>
	</div>
	<button type="submit">Add Task</button>
</form>



@endsection