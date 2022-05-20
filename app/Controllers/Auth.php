<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController

{
    public function login()
    {
        //
        if ($this->request->getMethod() === 'post') {
            $modelUser = model(Users::class);
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $currentUser = $modelUser->where('email', $email)->first();
            if (password_verify($password, $currentUser->password)) {
                session()->set([
                    'name' => $currentUser->name,
                    'email' => $email,
                    'isLoggedIn' => true
                ]);
                // session()
                return redirect()->to(base_url('admin'));
            }
        }

        return view('pages/auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
