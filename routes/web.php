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
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

Route::middleware("auth")->group(function(){
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Route::get('/crear-admin', [AuthController::class, 'createAdmin']);

Route::prefix('sales')->middleware('auth')->group(function(){
    Route::get('/nueva-venta', [SaleController::class, 'index'])->name('new-sale');
});

Route::prefix('salesdetails')->middleware('auth')->group(function(){
    Route::get('/detalle-venta', [SaleDetailController::class, 'index'])->name('sale-details');
});

Route::prefix('categories')->middleware('auth')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/show{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::delete('/destroy{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/edit{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/update{id}', [CategoryController::class, 'update'])->name('categories.update');
});

Route::prefix('customers')->middleware('auth')->group(function(){
    Route::get('/', [CustomerController::class, 'index'])->name('customers');
});

Route::prefix('products')->middleware('auth')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('products');
});

Route::prefix('users')->middleware('auth')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('users');
});