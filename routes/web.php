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
})->name('product.detail');

Route::get('/product/{id}/items/{item}', function ($productId, $itemId) {
    return "Product $productId, item $itemId";
})->name('product.item.detail');

Route::get('/categories/{id}', function ($id) {
    return "Category $id";
})->where('id', '[0-9]+')->name('category.detail'); // regex

Route::get('/user/{id?}', function ($userid = '404') {
    return "User $userid";
})->name('user.detail');

Route::get('conflict/fool', function () {
    return "Conflict Fool";
});

Route::get('conflict/{name}', function ($name) {
    return "Conflict $name";
});

Route::get('produk/{id}', function ($id) {
    $link = route('product.detail', ['id' => $id]);
    return "Link $link";
});

Route::get('produk-redrect/{id}', function ($id) {
    return redirect()->route('product.detail', ['id' => $id]);
});
