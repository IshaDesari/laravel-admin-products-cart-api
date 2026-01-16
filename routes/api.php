<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CheckoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    // Cart Routes
    Route::post('/cart/items', [CartController::class, 'store']);
    Route::get('/cart', [CartController::class, 'show']);
    Route::patch('/cart/items/{product_id}', [CartController::class, 'update']);
    Route::delete('/cart/items/{product_id}', [CartController::class, 'destroy']);

    // Checkout Routes
    Route::post('/cart/checkout', [CheckoutController::class, 'checkout']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
