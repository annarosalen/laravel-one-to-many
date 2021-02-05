<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// EMPLOYEES
Route::get('/employees', 'EmployeeController@index') -> name('employees-index');


// TASKS
Route::get('/tasks', 'TaskController@index') -> name('tasks-index');
