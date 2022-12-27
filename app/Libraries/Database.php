<?php

namespace App\Libraries;

use Medoo\Medoo;

class Database
{
    /**
     * @return Medoo
     */
    public static function getInstance(): Medoo
    {
        global $database;
        if (is_null($database)) {
            $database =  new Medoo([
                'type' => 'mysql',
                'host' => $_ENV['DB_HOST'],
                'database' => $_ENV['DB_DATABASE'],
                'username' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],

                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'port' => $_ENV['DB_PORT'],
            ]);
        }

        return $database;
    }
}
