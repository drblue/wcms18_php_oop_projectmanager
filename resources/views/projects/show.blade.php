@extends('layouts/app')

@section('content')
	<div class="container mt-3">
		<h1>{{ $project->title }}</h1>

		<p>{{ $project->description }}</p>

		<ol>
		@foreach($todos as $todo)
			<li>{{ $todo->title }}</li>
		@endforeach
		</ol>

		<div>
			<a href="/projects/{{ $project->id }}/edit" class="btn btn-warning">Edit Project</a>

			<form method="POST" action="/projects/{{ $project->id }}">
				@csrf
				@method('DELETE')

				<input type="submit" value="Delete Project" class="btn btn-danger">
			</form>
		</div>

		<div>
			<a href="/projects">&laquo; Back to all projects</a>
		</div>
	</div>
@endsection
