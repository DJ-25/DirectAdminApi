<?php

namespace App\Controllers;

use Jenssegers\Blade\Blade;
use App\Services\DirectAdmin\DirectAdminClient;

abstract class BaseController
{
    protected $blade;

    public function __construct()
    {
        $this->blade = new Blade('views', 'cache');
        $this->directAdmin = new DirectAdminClient;
    }

    protected function view(string $view, array $data = [])
    {
        return $this->blade->make($view, $data)->render();
    }

    protected function showResponseMessages($response)
    {
        return $this->view('response_messages', ['messages' => $response]);
    }
}