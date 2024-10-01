<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:10'],
            'articleText' => ['required', 'string', 'max:100'],
            'articleImg' => ['required', 'image', 'mimes:png,jpeg,jpg', 'max:2048'],
        ];
    }

}
