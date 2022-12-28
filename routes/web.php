<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Clients\ClientController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Middlewares\AuthMiddleware;
use App\Http\Middlewares\MigrationsMiddleware;
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;


// all application inside migration middleware to prevent manualy run migrations
SimpleRouter::group(['middleware' => MigrationsMiddleware::class], function () {

    SimpleRouter::group(['middleware' => AuthMiddleware::class], function () {
        SimpleRouter::get('/', [HomeController::class, 'index'])->name('home');

        SimpleRouter::group(['prefix' => '/clients'], function () {
            SimpleRouter::get('/', [ClientController::class, 'load'])->name('clients.load');
            SimpleRouter::post('/', [ClientController::class, 'create'])->name('clients.create');
            SimpleRouter::post('/{id}', [ClientController::class, 'update'])->name('clients.update');
            SimpleRouter::put('/{id}', [ClientController::class, 'store'])->name('clients.store');
            SimpleRouter::delete('/{id}', [ClientController::class, 'delete'])->name('clients.delete');
        });

        SimpleRouter::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    SimpleRouter::get('/login', [AuthController::class, 'login'])->name('login');
    SimpleRouter::post('/login', [AuthController::class, 'submit']);
});


SimpleRouter::error(function (Request $request, \Exception $exception) {
    response()->redirect('/');
});
