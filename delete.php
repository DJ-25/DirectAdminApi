<?php

use App\Controllers\DirectAdminController;

require 'vendor/autoload.php';

$show = new DirectAdminController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']))
{
    echo $show->deleteUser($_POST['username']);
}

echo $show->showUsersList();