@extends('layouts.main-layout')

@section('content')

    <h1>SELECTED TASK:</h1>

    TITLE: {{$task -> title}} <br>
    DESCRIPTION: {{$task -> description }} <br>
    PRIORITY: {{$task -> priority }} <br><br>

    {{-- @php
        dd($task);
    @endphp --}}

    EMPLOYEE:      
    <ul>                
        <li>{{$task -> employee -> name}} {{$task -> employee -> lastname}}</li>
    </ul>

    TYPOLOGIES:
    <ul>
        @foreach ($task -> typologies as $typology)

            <li>{{$typology -> name}}</li>
            
        @endforeach
    </ul>

    <a href="{{route('task-edit', $task -> id)}}">EDIT</a> <br>
    
@endsection