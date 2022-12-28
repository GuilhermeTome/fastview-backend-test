<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Libraries\Auth;
use App\Libraries\Database;
use App\Libraries\Hash;
use App\Libraries\Http;

final class AuthController extends Controller
{
    public function login()
    {
        if (Auth::user() !== null) {
            return redirect(url('home'));
        }
        return $this->view->render('login');
    }

    public function submit()
    {
        $data = input()->all([
            'email',
            'password'
        ]);

        $user = Database::getInstance()
            ->select('users', '*', [
                'email' => $data['email']
            ])[0] ?? null;

        if ($user === null || !Hash::attempt($data['password'], $user['password'] ?? '')) {
            return response()
                ->httpCode(Http::BAD_REQUEST)
                ->json([
                    'message' => 'Usuário e/ou senha incorretos'
                ]);
        }

        Auth::login($user['id']);
        return response()
            ->json([
                'url' => url('home')
            ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }
}
