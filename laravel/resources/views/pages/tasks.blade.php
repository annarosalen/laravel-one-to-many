@extends('layouts.main-layout')

@section('content')
<h1>TASKS:</h1>

<ul>

    @foreach ($tasks as $task)
        <li>
            {{$task -> title }}
            {{$task -> description }}
            {{$task -> priority }}

        </li>
    @endforeach

</ul>
@endsection