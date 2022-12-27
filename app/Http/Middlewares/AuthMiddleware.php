<?php

namespace App\Http\Middlewares;

use App\Libraries\Auth;
use App\Libraries\Hash;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
        // Authenticate user, will be available using request()->user
        $request->user = Auth::user();

        // If authentication failed, redirect request to user-login page.
        if ($request->user === null) {
            redirect(url('login'));
        }
    }
}
