<?php

namespace App\Libraries;

use App\Models\User;

class Auth
{

    /**
     * @param integer $id
     * @return boolean
     */
    public static function login(int $id): bool
    {

        $user = Database::getInstance()->select('users', [
            'id'
        ], [
            'id' => $id
        ]);

        $_SESSION['loggued_id'] = $id;

        return true;
    }

    /**
     * @return object|null
     */
    public static function user(): ?object
    {
        $user = Database::getInstance()->select('users', '*', [
            'id' => (int) $_SESSION['loggued_id']
        ]);

        return count($user) ? (object) $user : null;
    }
}
