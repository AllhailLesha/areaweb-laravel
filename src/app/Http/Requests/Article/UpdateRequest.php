<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['string', 'min:2', 'max:10'],
            'body' => ['string', 'max:500'],
            'articleImg' => ['image', 'mimes:png,jpeg,jpg', 'max:2048'],
        ];
    }
}
