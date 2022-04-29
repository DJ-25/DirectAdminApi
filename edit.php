<?php

use App\Controllers\DirectAdminController;

require 'vendor/autoload.php';

$show = new DirectAdminController();

$username = $_GET['user'] ?? $_POST['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_POST['action']) && $_POST['action'] == 'customize')
    {
        echo $show->updateUserDetails($_POST);
    }
    else if (isset($_POST['action']) && $_POST['action'] == 'password')
    {
        echo $show->updateUserPassword($_POST);
    }
}

echo $show->showUserDetails($username);