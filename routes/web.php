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
Route::get('/delete_project/{id}','ProjectController@DeleteProject')->name('delete_project');

Route::get('/tasks/{project_id}','TaskController@ListTasks')->name('tasks');
Route::get('/task_add_edit/{id?}','TaskController@AddEditTask')->name('task_add_edit');
Route::post('/insertTask/{id}','TaskController@InsertTask')->name('insert_task');
Route::get('/delete_task/{id}','TaskController@DeleteTask')->name('delete_task');
Route::get('/change_status/{id}','TaskController@ChangeStatus')->name('change_status');

Route::get('/other_projects','AdminController@OtherProjects')->name('other_projects');
Route::get('/users_list','AdminController@ListUsers')->name('users_list');
Route::get('/delete_user/{id}','AdminController@DeleteUser')->name('delete_user');

