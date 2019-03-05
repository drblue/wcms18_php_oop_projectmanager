<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

// Route::get('/projects', 'ProjectController@index');
// Route::get('/projects/{project}', 'ProjectController@show');
Route::resource('/projects', 'ProjectController');

// Route::get('/todos', 'TodoController@index');
// Route::get('/todos/create', 'TodoController@create');
// Route::post('/todos', 'TodoController@store');
// Route::get('/todos/{todo}', 'TodoController@show');
// Route::get('/todos/{todo}/edit', 'TodoController@edit');
// Route::post('/todos/{todo}', 'TodoController@update');
// Route::delete('/todos/{todo}', 'TodoController@destroy');
Route::resource('/todos', 'TodoController');
