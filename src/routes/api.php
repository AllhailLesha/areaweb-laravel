<?php

use App\Http\Controllers\Api\v1\ArticlesController;
use App\Http\Controllers\Api\v1\ProductsController;
use App\Http\Controllers\Api\v1\CommentsController;
use App\Http\Controllers\Api\v1\CategoriesController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Middleware\Artisan\IsPublic;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Api\TokenAuthMiddleware;

Route::controller(ArticlesController::class)->prefix('articles')->group(function () {
    Route::get('/', 'index');
    Route::get('/{article}', 'show')->middleware(IsPublic::class, TokenAuthMiddleware::class);
    Route::post('/', 'store');
    Route::patch('/{article}', 'update');
    Route::put('/{article}', 'updateOrCreate');
    Route::post('/{article}/update-image', 'updateImage');
    Route::delete('/{article}', 'destroy');
});

Route::controller(ProductsController::class)->group(function () {
    Route::get('products', 'index');
    Route::get('/products/{product}', 'show');
    Route::patch('/products/{product}', 'update');
    Route::post('/categories/{category}/product', 'store');
});

Route::controller(CommentsController::class)->group(function () {
    Route::post('/articles/{article}/comment', 'create');
});

Route::controller(CategoriesController::class)->group(function () {
    Route::post('/categories', 'create');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/login', 'login');
});





