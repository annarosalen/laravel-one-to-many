<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Typology;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return view('pages.tasks', compact('tasks'));
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees= Employee::all();
        $typologies = Typology::all();
        return view('pages.task-create', compact('employees','typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request ->all();

        $employee = Employee::findOrFail($data['employee_id']);
        $task = Task::make($request -> all());
        $task -> employee() -> associate($employees);
        $task -> save();

        $typologies = Typology::findOrFail($data['typologies']);
        $task -> typologies() -> attach($typologies);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('pages.task-show', compact('task'));

        dd($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::all();
        $typologies = Typology::all();

        $task = Task::findOrFail($id);
        return view('pages.task-edit', compact('employees','typologies','task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> all();

        $employee = Employee::findOrFail($data['employee_id']);
        $task = Task::findOrFail($id);
        $task -> update($data);
        $task -> employee() -> associate($employee);
        $task -> save();

        $typologies = Typology::findOrFail($data['typologies']);
        $task -> typologies() -> sync($typologies);

        return view('pages.task-show', compact('employee','typologies','task'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
