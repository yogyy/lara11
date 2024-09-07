<?php

use App\Exceptions\ValidationException;
use App\Http\Middleware\ContohMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use PHPUnit\Runner\InvalidOrderException;

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
        $exceptions->reportable(function (Throwable $e) {
            // var_dump($e);
            return false;
        });

        $exceptions->dontReport([
            ValidationException::class
        ]);

        $exceptions->renderable(function (ValidationException $e, Request $request) {
            return response("Bad Request", 400);
        });
    })->create();
