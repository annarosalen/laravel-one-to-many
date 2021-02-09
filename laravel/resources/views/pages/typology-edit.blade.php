@extends('layouts.main-layout')

@section('content')

    <h1>EDIT TYPOLOGY:</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('typology-update', $typology -> id)}}" method="POST">

        @csrf
        @method('POST')

        <label for="name">Name</label>
        <input type="text" name="name" value = "{{$typology -> name}}">

        <br>
        <br>

        <label for="description">Description</label>
        <input type="text" name="description"  value = "{{$typology -> description}}">

        <br>
        <br>

        <label for="tasks[]">Tasks</label> <br>
        @foreach ($tasks as $task)

            <input name="tasks[]" type="checkbox" value="{{ $task -> id }}"
                @if ($typology -> tasks -> contains($task -> id))
                checked
                @endif
            > {{$task -> title}} <br>
            
        @endforeach

        <br>
        <br>

        <input type="submit" value="UPDATE">


    </form>
    
@endsection