<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::post('products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('products/sort', [ProductController::class, 'sort'])->name('products.sort');
