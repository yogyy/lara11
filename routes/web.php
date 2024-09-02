<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fool', function () {
    return "Hello Mr. Fool";
});

Route::redirect('/clown', '/fool', 301);

Route::fallback(function () {
    return "i&#039;m going back to 404";
});

Route::view('/hello', 'hello', ['name' => 'Constantine']);

Route::get('/hello-world', function () {
    return view('hello.world', ['name' => 'Constantine']);
});
