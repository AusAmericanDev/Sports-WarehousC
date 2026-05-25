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
