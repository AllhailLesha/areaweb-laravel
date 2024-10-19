<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Api\TokenAuthMiddleware;
use App\Http\Requests\Api\Articles\CreateRequest;
use App\Http\Requests\Api\Articles\UpdateOrCreateRequest;
use App\Http\Requests\Api\Articles\UpdateRequest;
use App\Http\Requests\Api\Articles\UploadRequest;
use App\Http\Resources\Articles\ArticleResource;
use App\Http\Resources\Articles\MinifiedArticleResource;
use App\Models\Article;
use App\Models\Base\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{

    public function index()
    {
        return MinifiedArticleResource::collection(
            Article::query()->where('is_public', true)->get()
        );
    }

    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    public function store(CreateRequest $request)
    {
        $article = Article::query()->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'preview_image' => Article::getFilePath($request),
            'is_public' => 1
        ]);
        return response()->json($this->show($article), 201);
    }

    public function update(UpdateRequest $request, Article $article)
    {
        $article->update($request->validated());
        return response()->json($this->show($article));
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

        return response()->json($this->show($article));
    }

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
