<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/contact', function () {
    $categories = \App\Models\Category::all();
    return view('contact', compact('categories'));
})->name('contact.index');

Route::get('/products', function () {
    $products = \App\Models\Product::all();
    $categories = \App\Models\Category::all();
    return view('products.index', compact('products', 'categories'));
})->name('products.index');
