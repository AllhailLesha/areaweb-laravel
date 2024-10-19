<?php

namespace App\Http\Resources\Articles;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MinifiedArticleResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return
            [
                'id' => $this->id,
                'title' => $this->title,
                'isPublic' => $this->is_public,
                'previewImage' => $this->preview_image,
            ];
    }
}
