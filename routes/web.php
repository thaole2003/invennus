<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BillController as AdminBillController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\admin\InventoryEntryController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\StoreVariantController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Admin\VendoreController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\BillController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\WishlistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
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

// Route::get('/home', function () {
//     return view('client.layouts.components.main');
// })->name('home');

Auth::routes();
// Route::get('/home', function () {
//     return view('layouts.app');
// })->name('home');
Route::get('/changeinfo', function () {
    return view('auth.changeInfo');
});
Route::post('/changeinfo/{id}',[AuthController::class,'editInfo'])->name('changeInfo');
Route::get('/dashboard', function () {
    return view('admin.thongke.charts');
});
Route::get('/changepassword', function () {
    return view('auth.changePassword');
});
Route::post('/changepassword/{id}',[AuthController::class,'editPassword'])->name('changePassword');
Route::get('/dashboard', function () {
    return view('admin.thongke.charts');
});
// Route::get('/thongke', function () {
//     return view('admin.InventoryEntry.thongke');
// });
Route::get('/InventoryEntry', [InventoryEntryController::class, 'index'])->name('InventoryEntry');
Route::get('/InventoryEntryDetail/{id}', [InventoryEntryController::class, 'InventoryEntryDetail'])->name('InventoryEntryDetail');
Route::get('/importStock', [InventoryEntryController::class, 'create'])->name('importStock');
Route::post('/addStock', [InventoryEntryController::class, 'store'])->name('addStock');
Route::get('/report-revenue', [ReportController::class, 'reportRevenue'])->name('report-revenue');
Route::post('/filter-revenue', [ReportController::class, 'filterRevenue'])->name('filter-revenue');
Route::get('/report-product', [ReportController::class, 'reportProduct'])->name('report-product');
Route::post('/filter-product', [ReportController::class, 'filterProduct'])->name('filter-product');


Route::prefix('admin')->as('admin.')->middleware('store.access:admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'revenue7day'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::resource('admins', AdminController::class);

    Route::get('permissions-import', [PermissionController::class, 'importPermission'])->name('permissions-import');
    Route::get('permissions-export', [PermissionController::class, 'Export'])->name('permissions-export');
    Route::post('permissions-import', [PermissionController::class, 'Import'])->name('import');

    Route::resource('vendors', VendoreController::class);
    Route::resource('ads', AdsController::class);
    Route::resource('users', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('color', ColorController::class);
    Route::resource('size', SizeController::class);
    Route::resource('store', StoreController::class);
    Route::resource('product', ProductController::class);
    Route::resource('sale', SaleController::class);
    Route::resource('image', ImageController::class);
    Route::resource('postCategory', PostCategoryController::class);
    Route::resource('post', PostController::class);
    Route::get('store/{storeid}/variant/{variantid}', [StoreVariantController::class, 'liststorevariant'])->name('store.variant.list');
    Route::resource('storevariant', StoreVariantController::class);
    Route::get('showStoreVariant/{idStore}/{idProduct}', [StoreVariantController::class, 'showStoreVariant'])->name('showStoreVariant');
    Route::put('editprice/{id}', [ProductController::class, 'updateprice'])->name('variant.editprice');
    Route::put('updatequantitystock/{id}', [ProductController::class, 'updatequantitystock'])->name('variant.updatequantitystock');
    Route::prefix('bill')->name('bill.')->group(function () {
        Route::get('/', [AdminBillController::class, 'index'])->name('detail');
        Route::get('/product/{id}', [AdminBillController::class, 'show'])->name('product');
        Route::post('/update-status', [AdminBillController::class, 'updateStatus'])->name('update-status');
    });
})->middleware('auth');
Route::get('/', [ClientHomeController::class, 'index'])->name('home');
Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', [ClientHomeController::class, 'allProduct'])->name('home');
    Route::get('/detail/{id}', [ClientHomeController::class, 'product'])->name('detail');
    Route::get('/QuickView/{id}', [ClientHomeController::class, 'products'])->name('QuickView');
    Route::get('check-detail-quantity', [ClientHomeController::class, 'checkQuantity'])->name('check-detail-quantity');
});
Route::prefix('post')->name('post.')->group(function () {
    Route::get('/', [ClientHomeController::class, 'post'])->name('home');
    Route::get('/detail/{id}', [ClientHomeController::class, 'postDetail'])->name('detail');
    // Route::get('/QuickView/{id}', [ClientHomeController::class, 'products'])->name('QuickView');
    // Route::get('check-detail-quantity', [ClientHomeController::class, 'checkQuantity'])->name('check-detail-quantity');
});
Route::prefix('bill')->name('bill.')->middleware('auth')->group(function () {
    Route::get('/detail', [BillController::class, 'index'])->name('detail');
    Route::get('/product/{id}', [BillController::class, 'show'])->name('product');
    Route::post('/store', [BillController::class, 'store'])->name('store');
    Route::post('/momo_payment', [BillController::class, 'momoPayment'])->name('momo_payment');
    Route::post('/vnpay_payment', [BillController::class, 'vnpayPayment'])->name('vnpay_payment');
})->middleware('auth');
Route::prefix('wishlist')->name('wishlist.')->middleware('auth')->group(function () {
    Route::get('/add-to-wishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('add-to-wishlist');
    Route::delete('/del-to-wishlist/{id}', [WishlistController::class, 'destroy'])->name('del-to-wishlist');
    // Route::delete('/del-to-wishlist/{id}', [WishlistController::class, 'destroy'])->name('del-to-wishlist');

});
Route::prefix('cart')->name('cart.')->middleware('auth')->group(function () {
    Route::get('view-cart', [CartController::class, 'viewCart'])->name('view-cart');
    Route::get('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::delete('del-cart/{id}', [CartController::class, 'delCart'])->name('del-cart');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('get-total-price', [CartController::class, 'getTotalPrice'])->name('get-total-price');
})->middleware('auth');
// Route::get('checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::resource('bill', BillController::class);
// Route::get('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
// Route::delete('del-cart/{id}', [CartController::class, 'delCart'])->name('del-cart')->middleware('auth');
// Route::get('view-cart', [CartController::class, 'viewCart'])->name('view-cart')->middleware('auth');
// Route::get('get-total-price', [CartController::class, 'getTotalPrice'])->name('get-total-price')->middleware('auth');
Route::post('search', [ClientHomeController::class, 'search'])->name('search');

Route::middleware(['auth', 'store.access:admin'])->group(function () {
    // Các route chỉ có quyền truy cập cho admin


    // vai trò
});

Route::middleware(['auth', 'store.access:employee'])->group(function () {
    // Các route cho phép cả admin và employee, nhưng employee bị giới hạn theo store_id
});

Route::middleware(['auth', 'store.access:user'])->group(function () {
    // Các route cho phép cả admin, employee và user, nhưng user chỉ có quyền truy cập tài khoản của mình
});




// Vai trò và quyền
// Route::resource('roles-permissions', RolePermissionController::class);
