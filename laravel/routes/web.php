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

//TYPOLOGIES
Route::get('/typologies', 'TypologyController@index') ->name('typologies-index');

Route::get('/typology/typology-create', 'TypologyController@create') ->name('typology-create');
Route::post('/typology/typology-store', 'TypologyController@store') ->name('typology-store');

Route::get('/typology/{id}', 'TypologyController@show') ->name('typology-show');

Route::get('/typology/edit/{id}' , 'TypologyController@edit') ->name('typology-edit');
Route::post('/typology/update/{id}', 'TypologyController@update') ->name('typology-update');