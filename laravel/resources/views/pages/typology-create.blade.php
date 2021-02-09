@extends('layouts.main-layout')

@section('content')

    <h1>NEW TYPOLOGY:</h1>

    <form action="{{route('typology-store')}}" method="POST">

        @csrf
        @method('POST')

        <label for="name">Name</label>
        <input type="text" name="name">

        <br>
        <br>

        <label for="description">Description</label>
        <input type="text" name="description">

        <br>
        <br>

        <label for="tasks[]">Tasks</label> <br>
        @foreach ($tasks as $task)

            <input name="tasks[]" type="checkbox" value="{{ $task -> id }}"> {{$task -> title}} <br>
            
        @endforeach

        <br>
        <br>

        <input type="submit" value="INVIA">


    </form>
    
@endsection