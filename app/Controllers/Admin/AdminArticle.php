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
        $articleModel = model(Articles::class);
        $data['categories'] = $categoryModel->index();
        $data['authors'] = $authorModel->index('id, name');

        if ($this->request->getMethod() === 'post') {
            $imgFile = $this->request->getFile('image');
            $imgName = explode('.', $imgFile->getName())[0] . time() . '.' . $imgFile->getClientExtension();
            $imgFile->move('assets/uploads/image', $imgName);
            $dataReq = [
                'title' => $this->request->getPost('title'),
                'image' => $imgName,
                'slug' => url_title($this->request->getPost('title'), '-', true) . '-' . time(),
                'content' => $this->request->getPost('content'),
                'status' => $this->request->getPost('status'),
                'author_id' => $this->request->getPost('author'),
                'category_id' => $this->request->getPost('category'),
            ];
            $articleModel->insert($dataReq);
            return redirect()->to(base_url('admin/articles'));
        }

        return view('pages/admin/article/create', $data);
    }

    public function destroy($id)
    {
        $model = model(Articles::class);
        if ($this->request->getMethod() === 'post' && $id) {
            $model->delete($id);
            var_dump($id);
            return redirect()->to(base_url('admin/articles'));
        }
        return view('pages/admin/article/destroy');
    }
}
