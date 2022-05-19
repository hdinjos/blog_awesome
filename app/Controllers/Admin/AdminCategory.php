<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminCategory extends BaseController
{
    public function index()
    {
        //
        session()->destroy();
        return view('pages/admin/category/index');
    }
}
