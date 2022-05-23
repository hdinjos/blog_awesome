<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminUser extends BaseController
{
    public function index()
    {
        $model = model(Users::class);
        $data['users'] = $model->indexJoin();
        return view('pages/admin/user/index', $data);
    }

    public function create()
    {
        $modelRole = model(Roles::class);
        $modelUser = model(Users::class);
        $data['roles'] = $modelRole->findAll();

        if ($this->request->getMethod() === 'post') {
            $reqData = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'bio' => $this->request->getPost('bio'),
                'role_id' => $this->request->getPost('role'),
            ];
            $modelUser->insert($reqData);
            return redirect()->to(base_url('admin/users'));
        }

        return view('pages/admin/user/create', $data);
    }

    public function destroy($id)
    {
        $model = model(Users::class);
        if ($this->request->getMethod() === 'post' && $id) {
            $model->delete($id);
            return redirect()->to(base_url('admin/users'));
        }
        return view('pages/admin/user/destroy');
    }

    public function update($id)
    {
        $modelRole = model(Roles::class);
        $modelUser = model(Users::class);
        $data['roles'] = $modelRole->findAll();
        $data['user'] = $modelUser->find($id);

        if ($this->request->getMethod() === 'post') {
            $dataReq = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'bio' => $this->request->getPost('bio'),
                'role_id' => $this->request->getPost('role'),
            ];
            $modelUser->update($id, $dataReq);
            return redirect()->to(base_url('admin/users'));
        }
        return view('pages/admin/user/update', $data);
    }
}
