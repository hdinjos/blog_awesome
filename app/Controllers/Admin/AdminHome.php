<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminHome extends BaseController
{
    public function index()
    {
        //
        // var_dump(session()->get('name'));
        return view('pages/admin/home');
    }
}
