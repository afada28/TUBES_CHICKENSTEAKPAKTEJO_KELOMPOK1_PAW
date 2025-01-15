<?php
use App\Http\Controllers\ProductController;  
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);  
Route::resource('orders', OrderController::class);  
