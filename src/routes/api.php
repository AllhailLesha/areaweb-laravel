<?php

use App\Http\Controllers\Api\v1\CategoriesController;
use App\Http\Controllers\Api\v1\CommentsController;
use App\Http\Controllers\Api\v1\Default\ArticlesController as DefaultArticlesController;
use App\Http\Controllers\Api\v1\ArticlesController;
use App\Http\Controllers\Api\v1\ProductsController;
use Illuminate\Support\Facades\Route;


Route::apiResources([
    'article' => DefaultArticlesController::class,
    'customArticles' => ArticlesController::class,
]);

Route::controller(ProductsController::class)->group(function () {
    Route::get('products', 'list');
    Route::get('/products/{product}', 'getProduct');
    Route::patch('/products/{product}', 'update');
    Route::post('/categories/{category}/product', 'create');
});

Route::controller(CommentsController::class)->group(function () {
    Route::post('/articles/{article}/comment', 'create');
});

Route::controller(CategoriesController::class)->group(function () {
    Route::post('/categories', 'create');
});





