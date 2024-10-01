<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\Article;
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
        dd(Article::find(1));
        /*return view('pages.home');*/
    }

    public function articles()
    {
        return view('pages.articles', [
            'articles' => $this->articles
        ]);
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

    public  function showArticle($article)
    {
        $article = array_filter($this->articles, function ($item) use ($article){
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
    }
}
