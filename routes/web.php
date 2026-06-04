<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

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
    return view('product.index', compact('products', 'categories'));
})->name('products.index');

Route::get('/about', function () {
    $categories = \App\Models\Category::all();
    return view('about', compact('categories'));
})->name('about.index');

// Task 1 & 2: Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.place');
Route::get('/order-confirmation/{id}', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');

// Task 3: Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Task 3 & 4: Protected Staff Dashboard (Must be logged in)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Password updates
    Route::get('/password', [AuthController::class, 'showPasswordForm'])->name('admin.password');
    Route::post('/password', [AuthController::class, 'updatePassword']);

    // Category Maintenance Resource (CRUD)
    Route::resource('categories', CategoryController::class);

    // Product/Item Maintenance Resource (CRUD)
    Route::resource('products', ProductController::class)->except(['show']);
});
