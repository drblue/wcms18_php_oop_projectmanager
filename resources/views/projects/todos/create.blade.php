@extends('layouts/app')

@section('content')
	<div class="container mt-3">
		<h1>Create a New Todo for project <em>{{ $project->title }}</em></h1>

		@include('partials/validation_errors')

		<form method="POST" action="/projects/{{ $project->id }}/todos">

			@csrf

			<div class="form-group">
				<label for="title">Todo Title</label>
				<input type="text" name="title" id="title" class="form-control" placeholder="Todo Title" required value="{{ old('title') }}">
			</div>

			<input type="submit" value="Create New Todo" class="btn btn-primary">
		</form>

		<a href="/projects/{{ $project->id }}">&laquo; Back to project</a>
	</div>
@endsection
