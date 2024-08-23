<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ExternalBookController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\BookController;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'login'])->name('login');

Route::post('register', [LoginController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->group(function (){
    // Auth
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    // Books
        Route::apiResource('v1/books', BookController::class);
    // Categories
        Route::apiResource('v1/categories', CategoryController::class)->only(['index', 'show']);
    // Tags
        Route::apiResource('v1/tags', TagController::class)->only(['index', 'show']);
});

