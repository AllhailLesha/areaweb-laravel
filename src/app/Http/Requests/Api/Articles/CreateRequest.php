<?php

namespace App\Http\Requests\Api\Articles;

use App\Http\Requests\Api\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:20'],
            'body' => ['required', 'string', 'max:500'],
            'preview_image' => ['required', 'image', 'mimes:png,jpeg,jpg', 'max:2048'],
        ];
    }
}
