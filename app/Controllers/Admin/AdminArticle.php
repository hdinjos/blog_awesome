<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminArticle extends BaseController
{
    public function index()
    {
        $model = model(Articles::class);
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $limit = $this->request->getVar('limit') ? $this->request->getVar('limit') : 10;
        $data['articles'] = $model->index('', $page, $limit);
        $data['pages'] = ceil($model->countAll() / $limit);
        $data['limit'] = $limit;
        $data['page'] = $page;
        session()->set(["page" => $page, "limit" => $limit]);
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
            if ($imgFile->getName() === '') {
                $dataReq = [
                    'title' => $this->request->getPost('title'),
                    'image' => 'default_img.jpg',
                    'slug' => url_title($this->request->getPost('title'), '-', true) . '-' . time(),
                    'content' => $this->request->getPost('content'),
                    'status' => $this->request->getPost('status'),
                    'author_id' => $this->request->getPost('author'),
                    'category_id' => $this->request->getPost('category'),
                ];
                $articleModel->insert($dataReq);
            } else {
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
            }
            return redirect()->to(base_url('admin/articles'));
        }

        return view('pages/admin/article/create', $data);
    }

    public function destroy($id)
    {
        $model = model(Articles::class);
        if ($this->request->getMethod() === 'post' && $id) {
            $img = $model->find($id)->image;
            $page = session()->get("page");
            $limit = session()->get("limit");
            if ($img !== 'default_img.jpg') {
                unlink('assets/uploads/image/' . $img);
            }
            $model->delete($id);
            $countRow = $model->countAll();
            if ($countRow % $limit !== 0 || $page === 1) {
                return redirect()->to(base_url('admin/articles?page=' . $page . '&limit=' . $limit));
            } else {
                return redirect()->to(base_url('admin/articles?page=' . ($page - 1) . '&limit=' . $limit));
            }
        }
        return view('pages/admin/article/destroy');
    }

    public function update($id)
    {
        $modelAuthor = model(Users::class);
        $modelCategory = model(Categories::class);
        $modelArticle = model(Articles::class);
        $data = [
            "authors" => $modelAuthor->index('id, name'),
            "categories" => $modelCategory->index(),
            "article" => $modelArticle->find($id)
        ];
        if ($this->request->getMethod() === 'post') {
            $imgFile = $this->request->getFile('image');
            $imgName = explode('.', $imgFile->getName())[0] . time() . '.' . $imgFile->getClientExtension();
            $page = session()->get("page");
            $limit = session()->get("limit");

            if ($imgFile->getName() === '') {
                $dataReq = [
                    'title' => $this->request->getPost('title'),
                    'slug' => url_title($this->request->getPost('title'), '-', true) . '-' . time(),
                    'content' => $this->request->getPost('content'),
                    'status' => $this->request->getPost('status'),
                    'author_id' => $this->request->getPost('author'),
                    'category_id' => $this->request->getPost('category'),
                ];
                $modelArticle->update($id, $dataReq);
            } else {
                if ($data['article']->image !== 'default_img.jpg') {
                    unlink('assets/uploads/image/' . $data['article']->image);
                }
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
                $modelArticle->update($id, $dataReq);
            }

            return redirect()->to(base_url('admin/articles?page=' . $page . '&limit=' . $limit));
        }
        return view('pages/admin/article/update', $data);
    }
}
