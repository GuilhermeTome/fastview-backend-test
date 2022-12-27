<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Middlewares\AuthMiddleware;
use App\Http\Middlewares\MigrationsMiddleware;
use Pecee\SimpleRouter\SimpleRouter;


// all application inside migration middleware to prevent manualy run migrations
SimpleRouter::group(['middleware' => MigrationsMiddleware::class], function () {

    SimpleRouter::group(['middleware' => AuthMiddleware::class], function () {
        SimpleRouter::get('/', [HomeController::class, 'index']);


        SimpleRouter::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });


    SimpleRouter::get('/login', [AuthController::class, 'login'])->name('login');
    SimpleRouter::post('/login', [AuthController::class, 'submit']);
});
