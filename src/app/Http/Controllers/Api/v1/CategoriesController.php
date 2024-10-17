<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Categories\CreateRequest;
use App\Models\Category;
use Database\Seeders\CategoriesSeeder;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create(CreateRequest $request)
    {
        $category = Category::query()->create($request->validated());
        dd($category);
        return response()->json($category, 201);
    }
}
