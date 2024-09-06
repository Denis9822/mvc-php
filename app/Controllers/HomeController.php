<?php

namespace App\Controllers;

use Core\View;

class HomeController
{
    public function index(): string|View
    {
        return view('index', ['name' => 'test']);
    }
}