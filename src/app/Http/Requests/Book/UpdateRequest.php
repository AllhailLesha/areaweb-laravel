<?php

namespace App\Http\Requests\Book;

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
            'title' => [ 'string', 'max:150'],
            'description' => [ 'string', 'max:350'],
            'year' => [ 'integer'],
            'author' => [ 'string', 'max:150'],
            'image_url' => [ 'image', 'mimes:png,jpeg', 'max:1024'],
            'total' => [ 'integer', 'min:0']
        ];
    }
}
