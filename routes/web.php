<?php

use App\Http\Controllers\AdminControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [ProductController::class, 'home'])->name('product.paginate.home');

Route::get('/home', [ProductController::class, 'home'])->name('product.paginate.home');

Route::get('/produk/{kategori?}', [ProductController::class, 'products'])->name('product.paginate.produk');

Route::get('/detail/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [LoginController::class, 'login'])->name('auth.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/dashboard', [AdminControllers::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/add-product', [AdminControllers::class, 'addProduct'])->name('admin.add.product');

    // Route untuk menyimpan produk baru
    Route::post('/admin/product', [AdminControllers::class, 'store'])->name('admin.product.store');

    // Route untuk menampilkan form edit product
    Route::get('/admin/product/{id}/edit', [AdminControllers::class, 'edit'])->name('admin.product.edit');
    
    // Route untuk update produk
    Route::put('/admin/product/{id}', [AdminControllers::class, 'update'])->name('admin.product.update');

    Route::delete('admin/product/{id}', [AdminControllers::class, 'destroy'])->name('admin.product.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});