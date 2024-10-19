<?php

namespace App\Http\Requests\Api\Articles;

use App\Http\Requests\Api\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'min:2', 'max:100'],
            'body' => ['string', 'max:500'],
            'is_public' => ['boolean'],
        ];
    }
}
