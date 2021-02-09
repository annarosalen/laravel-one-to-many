<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Typology;
use App\Task;

class TypologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typologies = Typology::all();

        return view('pages.typologies', compact('typologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $typologies = Typology::all();
        $tasks = Task::all();
        return view('pages.typology-create', compact('typologies','tasks'));
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

        $newTypology = Typology::create($data);
        $tasks = Task::findOrFail($data['tasks']);

        $newTypology -> tasks() -> attach($tasks);

        return redirect() -> route('typology-show', $newTypology -> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typology = Typology::findOrFail($id);

        return view('pages.typology-show', compact('typology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $tasks = Task::all();
        $typology = Typology::findOrFail($id);

        return view('pages.typology-edit', compact('typology', 'tasks'));

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

        $typology = Typology::findOrFail($id);
        $typology -> update($data);

        $tasks = Task::findOrFail($data['tasks']);

        $typology -> tasks() ->sync($tasks);

        return view('pages.typology-show', compact('typology', 'tasks'));
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
