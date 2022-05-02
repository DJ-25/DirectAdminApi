@extends('app')

@section('title', 'Users List')

@section('content')
<table>
    <tr>
        <td>Package</td>
    </tr>
    <tr>
        <td>{{ $details['package'] }}</td>
    </tr>
</table>

@php
    $onOffFields = [
        'account' => 'Account',
        'sysinfo' => 'Sysinfo',
        'php' => 'PHP',
        'redis' => 'Redis'
    ];
@endphp

<form action="edit.php?user={{ $username }}" method="POST">
    @foreach($onOffFields as $key => $value)
        <label for="{{ $key }}">{{ $value }}</label>
        <select name="{{ $key }}">
            <option value="ON" {{ 'ON' == $details[$key] ? 'selected' : ''}}>ON</option>
            <option value="OFF" {{ 'OFF' == $details[$key] ? 'selected' : ''}}>OFF</option>
        </select>
        <br>
    @endforeach

    <input type="hidden" name="user" value="{{ $username }}">
    <input type="hidden" name="action" value="customize">
    <input type="submit" value="Update">
</form>

<form action="edit.php?user={{ $username }}" method="POST">

    <p>Change password</p>
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Email" value="">
    <br><br>

    <label for="oldpassword">Old password</label>
    <input type="password" name="oldpassword" placeholder="Old password" value="">
    <br><br>

    <label for="password1">New password</label>
    <input type="password" name="password1" placeholder="New password" value="">
    <br><br>

    <label for="password2">Confirm password</label>
    <input type="password" name="password2" placeholder="Confirm password" value="">
    <br><br>

    <input type="hidden" name="user" value="{{ $username }}">
    <input type="hidden" name="action" value="password">
    <input type="hidden" name="api" value="yes">
    <input type="submit" value="Update">
</form>
@endsection