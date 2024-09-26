<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$articles = [
    [
        'id' => '1',
        'title' => 'articles title',
        'text' => 'text'
    ],
    [
        'id' => '2',
        'title' => 'articles title 2',
        'text' => 'articles text 2'
    ],
    [
        'id' => '3',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab expedita fuga ipsa magni minus optio, possimus, quaerat, qui quia quidem quo quod recusandae voluptatem! Est eum quod saepe sit sunt!'
    ]

];

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get("/articles", function () use ($articles) {
    return view('pages.articles', [
        'articles' => $articles
    ]);
})->name('articles');

Route::get('/articles/{article}', function ($article) use ($articles) {
    $article = array_filter($articles, function ($item) use ($article){
       return $item['id'] == $article;
    });

    $article = array_shift($article);

    if (is_null($article)) {
        return abort(404);
    }

   return view('pages.article', [
       'title' => $article['title'] ?? 'Анонимная статья',
       'text' => $article['text']
   ]);
})->name('article');
