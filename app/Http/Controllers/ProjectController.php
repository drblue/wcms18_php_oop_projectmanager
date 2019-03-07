<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

	/**
	 * Validation Rules
	 */
	protected $validation_rules = [
		'title' => 'required|min:5',
		'description' => 'required|min:5',
	];

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//$projects = Project::where('user_id', Auth::user()->id)->get();
		$projects = Auth::user()->projects;

		return view('projects/index', ['projects' => $projects]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('projects/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validData = $request->validate($this->validation_rules);

		$project = new Project();
		$project->user_id = Auth::user()->id;
		$project->title = $validData['title'];
		$project->description = $validData['description'];
		$project->save();

		return redirect('/projects')->with('status', 'Project created successfully!');
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

		return view('projects/show', ['project' => $project, 'todos' => $todos]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Project $project)
	{
		return view('projects/edit', ['project' => $project]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Project $project)
	{
		$validData = $request->validate($this->validation_rules);

		$project->title = $validData['title'];
		$project->description = $validData['description'];
		$project->save();

		return redirect('/projects/' . $project->id)->with('status', 'Project updated successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Project $project)
	{
		foreach ($project->todos as $todo) {
			$todo->delete();
		}

		$project->delete();

		return redirect('/projects')->with('status', 'Project successfully deleted 😅!');
	}
}
