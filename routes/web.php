<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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


Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'loginValidate'])
    ->name('admin.login.validate');

Route::middleware(['web', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

    // Product Routes
    Route::resource('/products', ProductController::class);
    Route::patch('products/{product}/toggle-status',[ProductController::class, 'toggleStatus'])->name('products.toggle');

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('logout');
});