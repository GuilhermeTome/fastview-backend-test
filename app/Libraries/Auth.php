<?php

namespace App\Libraries;

use App\Models\User;

class Auth
{

    /**
     * @param integer $id
     * @return void
     */
    public static function login(int $id)
    {
        $token = md5(uniqid(rand()));

        Database::getInstance()->update('users', [
            'token' => $token
        ], [
            'id' => $id
        ]);

        $_SESSION['loggued_token'] = $token;
    }

    /**
     * @return object|null
     */
    public static function user(): ?object
    {
        $user = Database::getInstance()->select('users', '*', [
            'token' => $_SESSION['loggued_token'] ?? ''
        ]);

        return count($user) ? (object) $user[0] : null;
    }

    /**
     * @return void
     */
    public static function logout()
    {
        unset($_SESSION['loggued_token']);
    }
}
