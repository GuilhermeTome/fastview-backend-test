<?php

namespace App\Http\Controllers;

use League\Plates\Engine;
use League\Plates\Extension\Asset;

abstract class Controller
{
    /** @var League\Plates\Engine */
    protected $view;

    public function __construct()
    {
        $this->view = new Engine(path('resources/views'));
    }
}
