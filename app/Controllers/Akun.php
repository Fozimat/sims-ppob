<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Akun extends BaseController
{
    public function index()
    {
        return view('akun/index');
    }
}
