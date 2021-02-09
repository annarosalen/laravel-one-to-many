@extends('layouts.main-layout')

@section('content')

    <h1>TYPOLOGY SELECTED:</h1>

    <h3>NAME: {{$typology -> name}} </h3>
    <h3>DESCRIPTION: {{$typology -> description}}</h3>

    TASKS:
    <ul>
        @foreach ($typology -> tasks as $task)

            <li>{{$task -> title}}</li>
            
        @endforeach
    </ul>
    
                    
     
    
@endsection