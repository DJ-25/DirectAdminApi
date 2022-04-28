<?php

use App\Controllers\DirectAdminController;

require 'vendor/autoload.php';


$show = new DirectAdminController();
echo $show->showUsersList();
