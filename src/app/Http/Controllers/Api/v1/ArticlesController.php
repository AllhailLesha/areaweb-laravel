<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Articles\CreateRequest;
use App\Http\Requests\Api\Articles\UpdateRequest;
use App\Http\Requests\Api\Articles\UploadRequest;
use App\Models\Article;
use App\Models\Base\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create(CreateRequest $request)
    {
        $article = Article::query()->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'preview_image' => Article::getFilePath($request),
            'is_public' => 1
        ]);
        return response()->json($this->getArticle($article), 201);
    }

    public function update(UpdateRequest $request, Article $article)
    {
        $article::query()->update($request->validated());
        return response()->json($this->getArticle($article));
    }

    public function updateImage(UploadRequest $request, Article $article)
    {
        $filePath = Upload::upload($request, storePath: "images/articles", imageKey: "preview_image");
        $article::query()->update([
            'preview_image' => $request->input('preview_image')
        ]);
        dd($filePath);
    }
}
