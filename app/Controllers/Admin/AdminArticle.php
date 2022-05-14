<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Database\Migrations\Articles;

class AdminArticle extends BaseController
{
    public function index()
    {
        //
        $model = model(Articles::class);
        $data = $model->findAll();
        var_dump($data[0]);
        return view('pages/admin/article/index');
    }
}
