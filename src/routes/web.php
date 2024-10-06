<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\PagesController;
use App\Http\Controllers\Base\ArticlesController;
use App\Http\Controllers\Base\UsersController;
use App\Http\Controllers\Base\BookController;

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get("/articles",'articles')->name('articles');
    Route::get('/books', 'books')->name('books');
    Route::get('/add-book', 'addBook')->name('addBook');
    Route::get('/books/{book}', 'showBook')->name('showBook');
    Route::get('/books/{book}/update', 'updateBook')->name('book.page.edit');
    Route::get('/articles/store', 'storeArticleForm')->name('article.page.store');
    Route::get('/user/form', 'getUser')->name('user.page.get');
    Route::get('/user/info', 'showUser')->name('user.page.show');
    Route::get('/articles/{article}', 'showArticle')->name('article');
    Route::get('/articles/{article}/edit', 'updateArticle')->name('article.page.edit');
});

Route::controller(ArticlesController::class)->group(function () {
    Route::post('/articles/store', 'store')->name('articles.store');
    Route::post('/articles/{article}/update', 'update')->name('articles.update');

});

Route::controller(UsersController::class)->group(function (){
    Route::post('/user/form', 'getUser')->name('user.get');
});

Route::controller(BookController::class)->group(function () {
   Route::post('/add-book', 'addBook')->name('add.book');
    Route::post('/book/{book}/update', 'update')->name('book.update');

});
