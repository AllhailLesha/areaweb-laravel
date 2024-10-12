s<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\PagesController;
use App\Http\Controllers\Base\ArticlesController;
use App\Http\Controllers\Base\UsersController;
use App\Http\Controllers\Base\BookController;
use App\Http\Controllers\Base\LoginController;
use App\Http\Controllers\Base\RegisterController;


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
    Route::post('/articles/{article}/delete', 'delete')->name('articles.delete');
});

Route::controller(UsersController::class)->group(function (){
    Route::post('/user/form', 'getUser')->name('user.get');
});

Route::controller(BookController::class)->group(function () {
   Route::post('/add-book', 'addBook')->name('add.book');
    Route::post('/book/{book}/update', 'update')->name('book.update');
});

Route::controller(\App\Http\Controllers\Base\CommentsController::class)->group(function () {
   Route::post('/add-comment/{article}', 'addComment')->name('comment.add');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register.form');
    Route::post('/register', 'register')->name('register.action');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.form');
    Route::post('/logout', 'logout')->name('logout.action');
    Route::post('/login', 'login')->name('login.action');
});

Route::controller(\App\Http\Controllers\Auth\Manager\RegisterController::class)->group(function () {
    Route::get('/manager-register', 'index')->name('manager-register.form');
    Route::post('/manager-register', 'register')->name('manager-register.action');
});

Route::controller(\App\Http\Controllers\Auth\Manager\LoginController::class)->group(function () {
    Route::get('/manager-login', 'index')->name('manager-login.form');
    Route::post('/manager-login', 'login')->name('manager-login.action');
    Route::post('/manager-logout', 'logout')->name('manager-logout.action');

});

