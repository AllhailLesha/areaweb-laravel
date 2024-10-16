<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function list()
    {
        return Article::query()
            ->select(['id', 'title', 'is_public', 'preview_image'])
            ->where('is_public', true)
            ->get()
            ->map(function ($article) {
                return
                    [
                        'id' => $article->id,
                        'title' => $article->title,
                        'isPublic' => $article->is_public,
                        'previewImage' => $article->preview_image,
                    ];
            });
    }

    public function getArticle(Article $article)
    {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'body' => $article->body,
            'isPublic' => $article->is_public,
            'previewImage' => $article->preview_image,
            'comments' => $article->comments()->map(function ($comment) {
                return
                    [
                        'id' => $comment->id,
                        'userName' => $comment->username,
                        'body' => $comment->body,
                    ];
            }),
        ];
    }
}
