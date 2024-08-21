<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use Modules\Shop\App\Http\Controllers\{
    CartController,
    OrderController,
    PaymentController,
    ShopController,
    ProductController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/toko', [HomeController::class, 'toko'])->name('toko');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/category/{categorySlug}', [ProductController::class, 'category'])->name('products.category');
Route::get('/tag/{tagSlug}', [ProductController::class, 'tag'])->name('products.tag');
Route::get('/products/search/{search}', [ProductController::class, 'search'])->name('products.search');
Route::get('/{categorySlug}/{productSlug}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function () {
    // Route::get('orders/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::get('orders/', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('orders/', [OrderController::class, 'store'])->name('orders.store');
    Route::post('orders/shipping_fee', [OrderController::class, 'shippingFee'])->name('orders.shipping_fee');
    Route::post('orders/choose-package', [OrderController::class, 'choosePackage'])->name('orders.choose_package');
    Route::post('orders/simpan-alamat', [OrderController::class, 'simpanAlamat'])->name('alamat.simpanAlamat');
    Route::delete('orders/alamat/{id}/remove', [OrderController::class, 'hapusAlamat'])->name('alamat.hapusAlamat');

    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::get('/carts/{id}/remove', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::put('/carts', [CartController::class, 'update'])->name('carts.update');
});

Route::post('/payments/midtrans', [PaymentController::class, 'midtrans'])->name('payments.midtrans');

Route::group([], function () {
    Route::resource('shop', ShopController::class)->names('shop');
});
