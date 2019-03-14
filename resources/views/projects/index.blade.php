@extends('layouts/app')

@section('content')
	<div class="container mt-3">
		<div class="card">
			<div class="card-header">
				All Projects
			</div>
			<div class="card-body">

				@include('partials/status')

				<ol>
				@foreach($projects as $project)
					<li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></li>
				@endforeach
				</ol>

				<a href="/projects/create" class="btn btn-primary">Create a New Project</a>

			</div>
		</div>
	</div>
@endsection
