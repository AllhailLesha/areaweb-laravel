<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\PagesController;
use App\Http\Controllers\Base\ArticlesController;
use App\Http\Controllers\Base\UsersController;

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get("/articles",'articles')->name('articles');
    Route::get('/articles/create', 'createArticleForm')->name('article.page.create');
    Route::get('/user/form', 'getUser')->name('user.page.get');
    Route::get('/user/info', 'showUser')->name('user.page.show');
    Route::get('/articles/{article}', 'showArticle')->name('article');
});

Route::controller(ArticlesController::class)->group(function () {
    Route::post('/articles/create', 'create')->name('articles.create');
});

Route::controller(UsersController::class)->group(function (){
   Route::post('/user/form', 'getUser')->name('user.get');
});

