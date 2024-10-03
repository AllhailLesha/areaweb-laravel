<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Article\StoreRequest;
class ArticlesController extends Controller
{
    public function store(StoreRequest $request)
    {
        if ($request->hasFile('articleImg')) {
            $previewImagePath = "/storage/{$request->file('articleImg')->store('images/articles')}";
        }

        $article = Article::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'is_public' => 1,
            'preview_image' => $previewImagePath ?? null
        ]);
        // $article->title = $request->input('title');
        // $article->body = $request->input('body');
        // $article->is_public = 1;
        // $article->preview_image = $previewImagePath;
        // $article->save();

        return redirect()->route('article', [
            'article'=> $article->id
        ]);
    }
}
