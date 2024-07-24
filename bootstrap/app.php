<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\SubdomainMiddleware;
use App\Http\Middleware\ActivatedMiddleware;
use App\Http\Middleware\VerifyAjaxRequest;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(SubdomainMiddleware::class);
		$middleware->alias([
            'isActivated' => ActivatedMiddleware::class,
            'isAjax' => VerifyAjaxRequest::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
