<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [ProductController::class, 'home'])->name('product.paginate.home');

Route::get('/home', [ProductController::class, 'home'])->name('product.paginate.home');

Route::get('/produk/{kategori?}', [ProductController::class, 'products'])->name('product.paginate.produk');

Route::get('/detail/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/search', [SearchController::class, 'search'])->name('search');