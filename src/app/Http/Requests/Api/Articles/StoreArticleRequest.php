<?php

namespace App\Http\Requests\Api\Articles;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:20'],
            'body' => ['required', 'string', 'max:500'],
            'preview_image' => ['required', 'image', 'mimes:png,jpeg,jpg', 'max:2048'],
        ];
    }
}
