<?php

use App\Http\Controllers\Api\v1\ArticlesController;
use App\Http\Controllers\Api\v1\ProductsController;
use App\Http\Middleware\Artisan\IsPublic;
use Illuminate\Support\Facades\Route;

Route::controller(ArticlesController::class)->group(function () {
    Route::get('articles', 'list');
    Route::get('/articles/{article}', 'getArticle')->middleware(IsPublic::class);
});

Route::controller(ProductsController::class)->group(function () {
    Route::get('products', 'list');
    Route::get('/products/{product}', 'getProduct');
});



