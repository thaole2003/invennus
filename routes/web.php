<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\StoreVariantController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\Client\CartController;
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

Route::get('/', function () {
    return view('client.layouts.components.main');
})->name('home');

Auth::routes();
Route::get('/home', function () {
    return view('layouts.app');
})->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.layouts.components.main');
    })->name('home');

    Route::resource('users', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('color', ColorController::class);
    Route::resource('size', SizeController::class);
    Route::resource('store', StoreController::class);
    Route::resource('product', ProductController::class);
    Route::resource('sale', SaleController::class);
    Route::resource('image', ImageController::class);
    Route::get('store/{storeid}/variant/{variantid}', [StoreVariantController::class, 'liststorevariant'])->name('store.variant.list');
    Route::resource('storevariant', StoreVariantController::class);
    Route::put('editprice/{id}', [ProductController::class, 'updateprice'])->name('variant.editprice');
    Route::put('updatequantitystock/{id}', [ProductController::class, 'updatequantitystock'])->name('variant.updatequantitystock');
});
Route::get('/', [App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');
Route::prefix('product')->name('product.')->group(function () {
    // Route::post('search', [HomeController::class, 'productSearch'])->name('search');
    Route::get('/detail/{id}', [App\Http\Controllers\Client\HomeController::class, 'product'])->name('detail');
    Route::get('check-detail-quantity', [App\Http\Controllers\Client\HomeController::class, 'checkQuantity'])->name('check-detail-quantity');
});
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
Route::resource('bill',BillController::class);
Route::get('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::delete('del-cart/{id}', [CartController::class, 'delCart'])->name('del-cart');
Route::get('view-cart', [CartController::class, 'viewCart'])->name('view-cart');
Route::get('get-total-price', [CartController::class, 'getTotalPrice'])->name('get-total-price');
