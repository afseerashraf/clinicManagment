<?php

use App\Http\Middleware\Receptionist;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminOrReceptionist;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
       // $middleware->append(AdminOrReceptionist::class);
       
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
