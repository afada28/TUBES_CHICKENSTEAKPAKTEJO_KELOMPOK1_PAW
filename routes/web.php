<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::get('/orders/create/{productId}', [OrderController::class, 'create'])->name('orders.create');
