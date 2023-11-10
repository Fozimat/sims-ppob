<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Transaction extends BaseController
{
    public function index()
    {
        return view('transaction/index');
    }

    public function history()
    {
        return view('transaction/history');
    }
}
