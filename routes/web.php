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
    return view('client.layouts.master');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->as('admin.')->group(function () {
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
    Route::put('editprice/{id}',[ProductController::class,'updateprice'])->name('variant.editprice');
});
