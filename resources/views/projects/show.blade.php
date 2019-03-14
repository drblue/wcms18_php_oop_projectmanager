@extends('layouts/app')

@section('content')
	<div class="container mt-3">
		<div class="card">
			<div class="card-header">
				{{ $project->title }}
			</div>
			<div class="card-body">

				@include('partials/status')

				<p>{{ $project->description }}</p>

				<ol>
					@foreach($todos as $todo)
						<li>
							{{ $todo->title }}
							@if($todo->completed)
								🕺🏻
							@else
								😱
							@endif
							<form method="POST" action="/projects/{{ $project->id }}/todos/{{ $todo->id }}">
								@csrf
								@method('PUT')

								<input type="checkbox" name="completed" value="1" onClick="this.form.submit();"
									@if($todo->completed)
										checked
									@endif
								>
							</form>
						</li>
					@endforeach
				</ol>

				<div class="d-flex">
					<a href="/projects/{{ $project->id }}/todos/create" class="btn btn-success">Add a new Todo</a>

					<a href="/projects/{{ $project->id }}/edit" class="btn btn-warning">Edit Project</a>

					<form method="POST" action="/projects/{{ $project->id }}">
						@csrf
						@method('DELETE')

						<input type="submit" value="Delete Project" class="btn btn-danger">
					</form>
				</div>

				<div class="mt-2">
					<a href="/projects" class="btn btn-primary">&laquo; Back to all projects</a>
				</div>
			</div>
		</div>
	</div>
@endsection
