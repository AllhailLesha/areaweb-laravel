<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Book;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private array $articles = [
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

    public function home()
    {
        return view('pages.home');
    }

    public function articles()
    {
        $articles = Article::where('is_public', true)->orderBy('created_at');
        return view('pages.articles', [
            'articles' => $articles->get()
        ]);
    }

    public function books()
    {
        $books = Book::where('id', '>=', 1)->orderBy('created_at');
        return view('pages.books', [
            'books' => $books->get()
        ]);
    }

    public function showBook(Book $book)
    {
        return view('pages.book', [
            'title' => $book->title,
            'description' => $book->description,
            'createdAt' => $book->created_at ?? 'До рождения Христа'
        ]);
    }

    public  function addBook()
    {
        return view('pages.addBook');
    }

    public function storeArticleForm()
    {
        return view('pages.storeArticle');
    }

    public function getUser()
    {
        return view('pages.userForm');
    }

    public function showUser()
    {
        return view('pages.userInfo');
    }

    public function about()
    {
        return view('pages.about');
    }

    public  function showArticle(Article $article)
    {
        return view('pages.article', [
            'title' => $article->title ?? 'Анонимная статья',
            'body' => $article->body
        ]);
    }
}
