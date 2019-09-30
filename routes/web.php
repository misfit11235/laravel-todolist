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

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/add-task-form', 'TaskController@addTaskForm')->name('add-task-form');
    Route::post('/add-task', 'TaskController@addTask')->name('add-task');
    Route::get('/edit-task-form/{taskId}', 'TaskController@editTaskForm')->name('edit-task-form');
    Route::post('/edit-task', 'TaskController@editTask')->name('edit-task');
    Route::get('/delete-task/{taskId}', 'TaskController@deleteTask')->name('delete-task');
});

