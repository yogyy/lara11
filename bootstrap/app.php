<?php

use App\Http\Middleware\ContohMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->validateCsrfTokens(except: [
        //     '/file/upload'
        // ]); 

        // $middleware->append(ContohMiddleware::class); // add to global
        $middleware->alias([
            'contoh' => ContohMiddleware::class
        ]);

        $middleware->appendToGroup('group-contoh', [
            'contoh:tarot-club,401',
        ]);

        $middleware->prependToGroup('group-contoh', [
            'contoh:tarot-club,401',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
