<?php

use App\Controllers\DirectAdminController;

require 'vendor/autoload.php';

$show = new DirectAdminController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    echo $show->createUser($_POST);
}

echo $show->showCreateUserForm();