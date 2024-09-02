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

Route::get('/product/{id}', function (int $productId) {
    return "Product $productId";
});

Route::get('/product/{id}/items/{item}', function ($productId, $itemId) {
    return "Product $productId, item $itemId";
});

Route::get('/categories/{id}', function ($id) {
    return "Category $id";
})->where('id', '[0-9]+'); // regex

Route::get('/user/{id?}', function ($userid = '404') {
    return "User $userid";
});

Route::get('conflict/fool', function () {
    return "Conflict Fool";
});

Route::get('conflict/{name}', function ($name) {
    return "Conflict $name";
});
