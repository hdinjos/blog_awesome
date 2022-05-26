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

    public function create()
    {
        $model = model(Categories::class);
        if ($this->request->getMethod() === 'post') {
            $dataReq = [
                'name' => $this->request->getPost('name')
            ];
            $model->insert($dataReq);
            return redirect()->to(base_url('admin/categories'));
        }
        return view('pages/admin/category/create');
    }

    public function destroy($id)
    {
        $model = model(Categories::class);
        if ($this->request->getMethod() === 'post' && $id) {
            $model->delete($id);
            return redirect()->to(base_url('admin/categories'));
        }
        return view('pages/admin/category/destroy');
    }

    public function update($id)
    {
        $model = model(Categories::class);
        if ($this->request->getMethod() === 'post' && $id) {
            $model->update($id, ['name' => $this->request->getPost('name')]);
            return redirect()->to(base_url('admin/categories'));
        }
        return view('pages/admin/category/update');
    }
}
