<?php

namespace App\Libraries;

use Pecee\SimpleRouter\SimpleRouter;

class App
{
    public static function run()
    {
        SimpleRouter::start();
    }
}
