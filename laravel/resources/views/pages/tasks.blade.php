@extends('layouts.main-layout')

@section('content')
<h1>TASKS:</h1>

<h2><a href="{{route ('task-create')}}">CREATE NEW TASK</a></h2>

<ul>

    @foreach ($tasks as $task)
        <li>
            <a href="{{route('task-show', $task -> id)}}">
                TITLE: {{$task -> title }} <br>

            </a>
            
        </li>
    @endforeach

</ul>
@endsection