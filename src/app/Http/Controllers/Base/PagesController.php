<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function home()
    {
        return view('pages.home');
    }

    public function articles()
    {
        $articles = Article::where('is_public', true)->orderBy('created_at')->withTrashed();
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
        dd($book->toArray());
        return view('pages.book', [
            'book' => $book
        ]);
    }

    public function updateBook(Book $book)
    {
        return view('pages.editBook', [
            'book' => $book
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
        $category = Category::find(1);

        dd($category->product);

        return view('pages.article', [
            'article' => $article,
            'comments' => $article->comments()
        ]);
    }

    public function updateArticle(Article $article)
    {
        return view('pages.editArticle', [
            'article' => $article
        ]);
    }

}
