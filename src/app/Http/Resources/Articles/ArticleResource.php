<?php

namespace App\Http\Resources\Articles;

use App\Http\Resources\Comments\CommentResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        /**
         *
         */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'isPublic' => $this->is_public,
            'previewImage' => $this->preview_image,
            'comments' => CommentResource::collection($this->comments),
        ];
    }
}
