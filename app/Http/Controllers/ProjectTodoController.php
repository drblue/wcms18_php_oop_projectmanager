<?php

namespace App\Http\Controllers;

use App\Project;
use App\Todo;
use Illuminate\Http\Request;

class ProjectTodoController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Project $project)
	{
		return view('projects/todos/create', ['project' => $project]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Project $project, Request $request)
	{
		$todo = Todo::create([
			'title' => $request->input('title'),
			'project_id' => $project->id,
		]);

		return redirect('/projects/' . $project->id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Todo  $todo
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Project $project, Todo $todo)
	{
		dump("I wanna edit");
		dd([
			'project' => $project,
			'todo' => $todo,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Todo  $todo
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Project $project, Todo $todo)
	{
		$todo->complete($request->has('completed'));

		return redirect('/projects/' . $project->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Todo  $todo
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Todo $todo)
	{
		//
	}
}
