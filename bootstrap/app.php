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
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
           
            'AuthCheckDoctor' => \App\Http\Middleware\AuthDoctor::class,
            'AuthReceptionist' => \App\Http\Middleware\AuthReceptionist::class,

        ]);
       
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
