<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\PagesController;

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get("/articles",'articles')->name('articles');
    Route::get('/articles/{article}', 'showArticle')->name('article');
});

