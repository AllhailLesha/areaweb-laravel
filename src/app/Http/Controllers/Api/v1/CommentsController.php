<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Comments\CreateRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use const http\Client\Curl\AUTH_ANY;

class CommentsController extends Controller
{
    public function getComment(Comment $comment)
    {
        return [
            'username' => $comment->username,
            'body' => $comment->body,
            'article_id' => $comment->article_id
        ];
    }

    public function create(Article $article, CreateRequest $request)
    {
        $user = Auth::check() ? Auth::user()->name : 'Anon';
        $comment = $article->comments()->create(array_merge($request->validated(), ['username' => $user]));

        return response()->json($this->getComment($comment), 201);
    }
}
