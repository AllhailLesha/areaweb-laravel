<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\AddRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function addComment(AddRequest $request, int $articleId)
    {
        $comment = Comment::create([
            'username' => 'Anonim',
            'article_id' => $articleId,
            'body' => $request->input('body'),
        ]);

        return redirect()->back();
    }
}
