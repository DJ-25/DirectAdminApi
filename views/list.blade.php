@extends('app')

@section('title')

@section('content')
    <h3>Users List</h3>

    <ul>
        @foreach($users as $user)
            <li> {{ $user }} </li>
        @endforeach
    </ul>
@endsection

