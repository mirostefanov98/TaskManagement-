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

Auth::routes();

Route::get('/','HomeController@welcome')->name('welcome');

Route::get('/projects','ProjectController@ListProjects')->name('projects');
Route::get('/project_add_edit/{id?}','ProjectController@AddEditProject')->name('project_add_edit');
Route::post('/insertProject/{id}','ProjectController@InsertProject')->name('insert_project');








Route::get('/TasksList/{projectId}','UserController@listTasks')->name('TasksList');
Route::get('/AddTask','UserController@addTask')->name('AddTask');
Route::get('/EditTask','UserController@editTask')->name('EditTask');
Route::post('/insertTask','UserController@insertTask')->name('insertTask');
Route::get('/delProject/{del}','UserController@delProject')->name('delProject');




