<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

final class HomeController extends Controller
{
    public function index()
    {
        return $this->view->render('index');
    }
}
