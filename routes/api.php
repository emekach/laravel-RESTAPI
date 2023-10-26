<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Registeration and login controller

Route::post('admin/register', [AdminController::class, 'register']);

Route::post('admin/login', [AdminController::class, 'login']);

// protected routes for only logged in admin users

Route::middleware(['admin'])->group(function () {

    Route::get('products', [ProductController::class, 'index']);

    Route::post('admin/logout', [AdminController::class, 'logout']);

    Route::post('product/add', [ProductController::class, 'store']);

    Route::get('product/{id}/show', [ProductController::class, 'show']);

    Route::put('product/{id}/update', [ProductController::class, 'update']);

    Route::delete('product/{id}/delete', [ProductController::class, 'destroy']);
});




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
