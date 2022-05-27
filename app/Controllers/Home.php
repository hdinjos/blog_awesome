<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $model = model(Articles::class);
        $data['articles'] = $model->index('publish');
        return view('index', $data);
    }
}
