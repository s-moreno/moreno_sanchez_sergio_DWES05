<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products/min', [ProductController::class, 'stockMin']);

Route::apiResource('products', ProductController::class);
