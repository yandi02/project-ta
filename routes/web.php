<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\{
    CategoryController,
    PelangganController,
    ProductController
};
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', fn () => redirect()->route('login'));

Route::middleware('auth')->group(function () {
    Route::get('/admin/category/data', [CategoryController::class, 'data'])->name('category.data');
    Route::resource('/admin/category', CategoryController::class);

    Route::get('/admin/pesanan/data', [PesananController::class, 'data'])->name('pesanan.data');
    Route::resource('/admin/pesanan', PesananController::class);

    Route::get('/admin/product/data', [ProductController::class, 'data'])->name('product.data');
    Route::get('/admin/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/admin/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::resource('/admin/product', ProductController::class);

    Route::get('/admin/pelanggan/data', [PelangganController::class, 'data'])->name('pelanggan.data');
    Route::resource('/admin/pelanggan', PelangganController::class);

    // Route::get('/admin/customers/data', [PelangganController::class, 'data'])->name('customer.data');
    // Route::get('/admin/customers', [PelangganController::class, 'index'])->name('pelanggan.index');
    // Route::delete('/admin/customers/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    Route::get('/admin/profile', [ProfileController::class, 'profile_admin'])->name('profile_admin.index');
    Route::get('/profile', [ProfileController::class, 'profile_user'])->name('profile_user.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/tes', function () {
    return view('tes.layouts.app');
});

Route::get('/dashboard', function () {
    return view('tes.pages.dashboard.index');
});

Route::get('/product', function () {
    return view('tes.pages.product.tambah');
});

Route::get('/product/tambah', [ProductController::class, 'tambah'])->name('product.tambah');