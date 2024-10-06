<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Article\StoreRequest;
class ArticlesController extends Controller
{
    public function store(StoreRequest $request)
    {

        $article = Article::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'is_public' => 1,
            'preview_image' => $this->getFilePath($request)
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

    public function update(UpdateRequest $request, Article $article) {
        $article->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'preview_image' => $this->getFilePath($request, $article->preview_image),

        ]);
        return redirect()->route('article', [
            'article'=> $article->id
        ]);    }

    private function getFilePath(Request $request, ?string $default = null): ?string
    {
        $previewImagePath = $default;
        if ($request->hasFile('articleImg')) {
            $previewImagePath = "/storage/{$request->file('articleImg')->store('images/articles')}";
        }
        return $previewImagePath;
    }
}
