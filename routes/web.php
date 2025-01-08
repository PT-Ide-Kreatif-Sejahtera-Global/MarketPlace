<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminControllers;

Route::get('/', [ProductController::class, 'home'])->name('product.paginate.home');

Route::get('/home', [ProductController::class, 'home'])->name('product.paginate.home');

Route::get('/produk', [ProductController::class, 'allProducts'])->name('product.paginate.produk');

Route::get('/detail/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/UMKM', [ProductController::class, 'umkm'])->name('umkm');

Route::get('/fashion', [ProductController::class, 'fashion'])->name('fashion');

Route::get('/pakaianpria', [ProductController::class, 'pakaianPria'])->name('pakaianpria');

Route::get('/pakaianwanita', [ProductController::class, 'pakaianWanita'])->name('pakaianwanita');

Route::get('/taspria', [ProductController::class, 'tasPria'])->name('taspria');

Route::get('/taswanita', [ProductController::class, 'tasWanita'])->name('taswanita');

Route::get('/aksesoris', [ProductController::class, 'aksesoris'])->name('aksesoris');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/search/umkm', [SearchController::class, 'searchUmkm'])->name('search.umkm');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/products', [AdminControllers::class, 'index'])->name('admin.products.index');
    Route::put('/admin/products/{product}/discount', [AdminControllers::class, 'updateDiscount'])
         ->name('admin.products.discount');
});