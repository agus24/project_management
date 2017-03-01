<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Auth::loginUsingId(3);
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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/test',function() {
	
});


Route::group(['middleware' => 'auth','namespace' => 'admin'], function () {
	Route::get('project/new', 'ProjectController@newProject');
	Route::post('project/new', 'ProjectController@postProject');
	Route::get('project/{id}', 'ProjectController@show');
	Route::get('project/{id}/edit', 'ProjectController@edit');
	Route::patch('project/{id}', 'ProjectController@update');
	Route::delete('project/{id}/delete', 'ProjectController@destroy');
	Route::get('project','ProjectController@semua');

	
	Route::get('project/{project_id}/addTask', 'TaskController@add');
	Route::post('project/{project_id}','TaskController@insert');
	Route::get('project/{project_id}/task/{task_id}','TaskController@show');
});

Route::put('changePassword', 'HomeController@chpass')->middleware('auth');