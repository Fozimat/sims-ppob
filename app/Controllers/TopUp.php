<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TopUp extends BaseController
{
    public function index()
    {
        return view('topup/index');
    }
}
