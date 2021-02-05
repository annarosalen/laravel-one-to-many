@extends('layouts.main-layout')

@section('content')
    
    <h1>EMPLOYEES:</h1>

    <ul>

        @foreach ($employees as $employee)
            <li>
                {{$employee -> name }}
                {{$employee -> lastname }}
                {{$employee -> dateOfBirth }}

            </li>
        @endforeach

    </ul>

@endsection