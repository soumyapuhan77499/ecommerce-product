<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductApiController;

Route::middleware('auth:sanctum')->post('/product-subscription', [ProductApiController::class, 'productSubscription']);

