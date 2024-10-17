<?php

use App\Http\Controllers\Api\v1\ArticlesController;
use App\Http\Controllers\Api\v1\ProductsController;
use App\Http\Controllers\Api\v1\CommentsController;
use App\Http\Controllers\Api\v1\CategoriesController;
use App\Http\Middleware\Artisan\IsPublic;
use Illuminate\Support\Facades\Route;

Route::controller(ArticlesController::class)->prefix('articles')->group(function () {
    Route::get('/', 'list');
    Route::get('/{article}', 'getArticle')->middleware(IsPublic::class);
    Route::post('/', 'create');
});

Route::controller(ProductsController::class)->group(function () {
    Route::get('products', 'list');
    Route::get('/products/{product}', 'getProduct');
    Route::post('/categories/{category}/product', 'create');
});

Route::controller(CommentsController::class)->group(function () {
    Route::post('/articles/{article}/comment', 'create');
});

Route::controller(CategoriesController::class)->group(function () {
    Route::post('/categories', 'create');
});



