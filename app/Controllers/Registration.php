<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Registration extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }
}
