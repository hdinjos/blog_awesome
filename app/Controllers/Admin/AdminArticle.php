<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Database\Migrations\Articles;

class AdminArticle extends BaseController
{
    public function index()
    {
        $model = model(Articles::class);
        $data['articles'] = $model->index();
        return view('pages/admin/article/index', $data);
    }

    public function create()
    {
        $categoryModel = model(Categories::class);
        $authorModel = model(Users::class);
        $data['categories'] = $categoryModel->index();
        $data['authors'] = $authorModel->index('id, name');
        var_dump($data);
        return view('pages/admin/article/create', $data);
    }
}
