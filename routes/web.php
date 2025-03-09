<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/home', [DashboardController::class, 'index'])->name('home');


Route::prefix('sales')->group(function(){
    Route::get('/nueva-venta', [SaleController::class, 'index'])->name('new-sale');
});

Route::prefix('salesdetails')->group(function(){
    Route::get('/detalle-venta', [SaleDetailController::class, 'index'])->name('sale-details');
});

Route::prefix('categories')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
});

Route::prefix('customers')->group(function(){
    Route::get('/', [CustomerController::class, 'index'])->name('customers');
});

Route::prefix('products')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('products');
});

Route::prefix('users')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('users');
});