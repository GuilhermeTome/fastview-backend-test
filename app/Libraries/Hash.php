<?php

namespace App\Libraries;

class Hash
{
    /**
     * @param string $password
     * @return string|false|null
     */
    public static function make(string $password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @param string $password
     * @param string $hash
     * @return boolean
     */
    public static function attempt(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
