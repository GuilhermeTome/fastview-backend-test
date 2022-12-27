<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

final class AuthController extends Controller
{
    public function login()
    {
        return $this->view->render('login');
    }

    public function submit()
    {
        $data = input()->all([
            'email',
            'password'
        ]);

        dd($data);

        // return $this->view->render('login');
    }

    public function logout()
    {
        # code...
    }
}
