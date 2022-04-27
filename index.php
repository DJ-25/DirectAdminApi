<?php

require 'vendor/autoload.php';

use App\Services\DirectAdmin\DirectAdminClient;

// $client = new DirectAdminClient();
// $userList = $client->getUsersList();
// var_dump($userList);

function showUsersList()
{
    $client = new DirectAdminClient();
    $userList = $client->getUsersListExample();
    // var_dump($userList); 
    
    include_once 'views/list.php';
}

showUsersList();

