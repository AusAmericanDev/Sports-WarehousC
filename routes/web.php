<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/category/{id}', [ProductController::class, 'showByCategory'])->name('storefront.category');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/products', function () {
    $products = \App\Models\Product::all();
    $categories = \App\Models\Category::all();
    return view('product.index', compact('products', 'categories'));
})->name('storefront.products');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/contact', function () {
    $categories = \App\Models\Category::all();
    return view('contact', compact('categories'));
})->name('contact.index');

Route::get('/about', function () {
    $categories = \App\Models\Category::all();
    return view('about', compact('categories'));
})->name('about.index');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.place');
Route::get('/order-confirmation/{id}', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');


/* 🔒 BREEZE CORE DASHBOARD ROOT */
/* 🔒 BREEZE CORE DASHBOARD ROOT */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* 🗂️ ADMINISTRATIVE RESOURCE SETS */
    Route::resource('admin/categories', CategoryController::class)->names([
        'index'   => 'categories.index',
        'create'  => 'categories.create',
        'store'   => 'categories.store',
        'edit'    => 'categories.edit',
        'update'  => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);

    Route::resource('admin/products', ProductController::class)->except(['show'])->names([
        'index'   => 'products.index',
        'create'  => 'products.create',
        'store'   => 'products.store',
        'edit'    => 'products.edit',
        'update'  => 'products.update',
        'destroy' => 'products.destroy',
    ]);
});

require __DIR__ . '/auth.php';
