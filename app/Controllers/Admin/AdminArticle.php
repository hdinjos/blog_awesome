<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminArticle extends BaseController
{
    public function index()
    {
        //
        return view('pages/admin/article/index');
    }
}
