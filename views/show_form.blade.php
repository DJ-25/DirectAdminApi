@extends('app')

@section('title', 'Create User')

@section('content')

    <h3>Users List</h3>

    <form action="create.php" method="POST">

        <input type="hidden" id="action" name="action" value="create">

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" required />
        </div>
        <br>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Example@gmail.com" required />
        </div>
        <br>

        <div>
            <label for="pass">Password (5 characters minimum):</label>
            <input type="password" id="pass" name="passwd" placeholder="Password" minlength="5" required />
        </div>
        <br>

        <div>
            <label for="pass2">Password (5 characters minimum):</label>
            <input type="password" id="pass2" name="passwd2" placeholder="Password" minlength="5" required />
        </div>
        <br>

        <div>
            <label for="domain">Domain:</label>
            <input type="text" id="domain" name="domain" placeholder="Domain" value="domain.com" required />
        </div>
        <br>

        <div>
            <label for="package">Package:</label>
            <select name="package">
                @foreach($packages as $package)
                    <option value="{{ $package }}">{{ $package }}</option>
                @endforeach
            </select>
        </div>
        <br>

        <div>
            <label for="package">IP:</label>
            <input type="text" id="ip" name="ip" placeholder="IP" value="49.12.245.225" required />
        </div>
        <br>

        <div>
            <label for="notify">Notify:</label>
            <input type="hidden" id="notify" name="notify" value="no" />
            <input type="checkbox" id="notify" name="notify" value="yes" />
        </div>
        <br>

        <div>
            <input type="reset" value="Reset">
        </div>
        <br>

        <div>
            <input type="submit" value="Submit">
        </div>

    </form> 
@endsection