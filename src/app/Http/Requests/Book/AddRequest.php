<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:350'],
            'year' => ['required', 'integer'],
            'author' => ['required', 'string', 'max:150'],
            'image_url' => ['required', 'image', 'mimes:png,jpeg', 'max:1024'],
            'total' => ['required', 'integer', 'min:0']
        ];
    }
}
