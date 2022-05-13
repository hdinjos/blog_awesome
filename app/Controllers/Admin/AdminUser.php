<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminUser extends BaseController
{
    public function index()
    {
        //
        return view('pages/admin/user/index');
    }
}
