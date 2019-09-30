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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/task/add-task-form', 'TaskController@addTaskForm')->name('task.add-form');
    Route::post('/task/add-task', 'TaskController@addTask')->name('task.add');
    Route::get('/task/edit-task-form/{taskId}', 'TaskController@editTaskForm')->name('task.edit-form');
    Route::post('/task/edit-task/{taskId}', 'TaskController@editTask')->name('task.edit');
    Route::get('/task/delete-task/{taskId}', 'TaskController@deleteTask')->name('task.delete');
    Route::post('/task/change-status/{taskId}/{status}', 'TaskController@changeStatus')->name('task.change-status');
});

