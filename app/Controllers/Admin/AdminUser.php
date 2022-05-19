<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Database\Migrations\Roles;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

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
        $data['roles'] = $modelRole->findAll();
        return view('pages/admin/user/create', $data);
    }
}
