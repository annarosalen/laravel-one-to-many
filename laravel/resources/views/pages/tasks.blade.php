@extends('layouts.main-layout')

@section('content')
<h1>TASKS:</h1>

<ul>

    @foreach ($tasks as $task)
        <li>
            {{$task -> title }}
            {{$task -> description }}
            {{$task -> priority }}
            
            <ul>
                
                <li>{{$task -> employee -> name}}</li>
            </ul>

        </li>
    @endforeach

</ul>
@endsection