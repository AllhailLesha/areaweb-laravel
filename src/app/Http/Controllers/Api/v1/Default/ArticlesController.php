<?php

namespace App\Http\Controllers\Api\v1\Default;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Articles\StoreArticleRequest;
use App\Http\Requests\Api\Articles\UpdateArticleRequest;
use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = Article::query()->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'preview_image' => Article::getFilePath($request),
            'is_public' => 1
        ]);
        return response()->json($this->show($article), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'body' => $article->body,
            'isPublic' => $article->is_public,
            'previewImage' => $article->preview_image,
            'comments' => $article->comments()->get()->map(function ($comment) {
                return
                    [
                        'id' => $comment->id,
                        'userName' => $comment->username,
                        'body' => $comment->body,
                    ];
            }),
        ];
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->validated());
        return response()->json($this->getArticle($article));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->delete())
        {
            $article->update([
                'is_public' => false,
            ]);
        }
        return response()->json(["status" => $article->delete()], 202);
    }
}
