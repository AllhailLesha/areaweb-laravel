<?php

namespace App\Http\Requests\Api\Products;

use App\Http\Requests\Api\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:100'],
            'description' => ['string', 'max:500'],
            'price' => ['numeric'],
            'is_active' => ['boolean'],
        ];
    }
}
