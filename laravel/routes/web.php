<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// EMPLOYEES
Route::get('/employees', 'EmployeeController@index') -> name('employees-index');


// TASKS
Route::get('/tasks', 'TaskController@index') -> name('tasks-index');

Route::get('/task/task-create', 'TaskController@create') -> name('task-create');
Route::post('/task/task-store', 'TaskController@store') -> name('task-store');

Route::get('/task/{id}', 'TaskController@show') -> name('task-show');

Route::get('/task/edit/{id}', 'TaskController@edit') -> name('task-edit');
Route::post('/task/update/{id}', 'TaskController@update') -> name('task-update');