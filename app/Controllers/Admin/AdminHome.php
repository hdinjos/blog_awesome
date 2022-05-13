<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminHome extends BaseController
{
    public function index()
    {
        //
        return view('pages/admin/home');
    }
}
