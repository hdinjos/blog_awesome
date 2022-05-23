<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminCategory extends BaseController
{
    public function index()
    {
        //
        $model = model(Categories::class);
        $data['categories'] = $model->index();
        return view('pages/admin/category/index', $data);
    }
}
