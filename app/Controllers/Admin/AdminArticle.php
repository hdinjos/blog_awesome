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

        if ($this->request->getMethod() === 'post') {
            $dataReq = [
                'title' => $this->request->getPost('title'),
                'image' => $this->request->getPost('image'),
                'slug' => url_title($this->request->getPost('title'), '-', true) . '-' . time(),
                'content' => $this->request->getPost('content'),
                'status' => $this->request->getPost('status'),
                'author_id' => $this->request->getPost('author'),
                'category_id' => $this->request->getPost('category'),
            ];
            var_dump($dataReq);
            // return redirect('admin/articles');
            // return view('pages/admin/article/create', $data);
        }

        return view('pages/admin/article/create', $data);
    }
}
