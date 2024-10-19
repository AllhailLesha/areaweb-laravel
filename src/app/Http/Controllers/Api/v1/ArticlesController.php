<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Articles\CreateRequest;
use App\Http\Requests\Api\Articles\UpdateOrCreateRequest;
use App\Http\Requests\Api\Articles\UpdateRequest;
use App\Http\Requests\Api\Articles\UploadRequest;
use App\Models\Article;
use App\Models\Base\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{

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


    public function updateOrCreate(UpdateOrCreateRequest $request, $article)
    {
        return Article::query()
            ->updateOrCreate(['id' => $article], $request->validated());
    }

    public function updateImage(UploadRequest $request, Article $article)
    {
        $filePath = Upload::upload($request, storePath: "images/articles", imageKey: "preview_image");
        $article->update([
            'preview_image' => $filePath,
        ]);

        return response()->json($this->getArticle($article));
    }

}
