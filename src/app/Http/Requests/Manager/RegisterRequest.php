<?php

namespace App\Http\Requests\Manager;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'lastname' => ['required', 'string'],
            'firstname' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'phone' => ['required', 'string', 'unique:managers,phone'],
            'password' => ['required', 'string', 'confirmed'],
        ];
    }
}
