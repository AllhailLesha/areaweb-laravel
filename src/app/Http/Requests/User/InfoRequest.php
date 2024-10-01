<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'userName' => ['required', 'string', 'max:100'],
            'userAge' => ['required', 'integer', 'max:100'],
            'userCountry' => ['required', 'string', 'max:30'],
            'userHobby' => ['required', 'string', 'max:150'],
            'userAbout' => ['nullable', 'string', 'max:300'],
            'userAvatar' => ['required', 'image', 'mimes:png,jpeg,jpg', 'max:2048'],
            'userResume' => ['required', 'file', 'mimes:pdf', 'max:1024'],
        ];
    }
}
