<?php

require 'vendor/autoload.php';

use App\Services\DirectAdmin\DirectAdminClient;
use Jenssegers\Blade\Blade;

class DirectAdminController
{
    function showUsersList()
    {
        $client = new DirectAdminClient();
        $userList = $client->getUsersListExample();
        // var_dump($userList); 

        $blade = new Blade('views', 'cache');
        return $blade->make('list', ['userList' => $userList])->render();
    }
}

$show = new DirectAdminController();
echo $show->showUsersList();
