<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('products', [ProductController::class, 'index']);

Route::post('product/add', [ProductController::class, 'store']);

Route::get('product/{id}/show', [ProductController::class, 'show']);

Route::put('product/{id}/update', [ProductController::class, 'update']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
