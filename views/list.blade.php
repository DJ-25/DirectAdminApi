@extends('app')

@section('title', 'Users List')

@section('content')
    <h3>Users List</h3>

    <ul>
        @foreach($users as $user)
            <li> <a href="edit.php?user={{ $user }}">{{ $user }}</a>
                <form action="delete.php" method="POST">
                    <input type="hidden" name="username" value="{{ $user }}">
                    <input type="submit" value="Usuń">
                </form>
                <br>
            </li>
        @endforeach
    </ul>
@endsection

