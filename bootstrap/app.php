<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        // * uncomment line below to remove api prefix for api routes
        //apiPrefix: ''
    )
    ->withMiddleware(function (Middleware $middleware) {
        // todo: i have to learn what this two do
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // todo: i have to learn what this two do
        //
    })->create();
