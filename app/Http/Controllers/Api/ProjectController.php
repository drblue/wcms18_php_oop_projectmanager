<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends \App\Http\Controllers\Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Project::all();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function show(Project $project)
	{
		$todos = $project->todos;

		return [
			'project' => $project,
			'todos' => $todos,
		];
	}
}
