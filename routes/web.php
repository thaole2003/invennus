<?php

use App\Http\Controllers\admin\CategoryController;
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
    return view('admin.layouts.master');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        $title = 'SB Admin 2 - Dashboard';
        return view('admin.dashboard', compact('title'));
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('category', CategoryController::class);
});
