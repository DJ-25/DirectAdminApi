<?php

namespace App\Controllers;

use App\Services\DirectAdmin\DirectAdminClient;
use Jenssegers\Blade\Blade;

class DirectAdminController
{
    function showUsersList()
    {
        $client = new DirectAdminClient();
        $userList = $client->getUsersListExample();

        $blade = new Blade('views', 'cache');
        return $blade->make('list', ['users' => $userList])->render();
    }

    function showCreateUserForm()
    {
        $blade = new Blade('views', 'cache');
        return $blade->make('create_view')->render();
    }
}