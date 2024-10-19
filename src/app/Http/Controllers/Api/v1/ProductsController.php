<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Products\CreateRequest;
use App\Http\Requests\Api\Products\UpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use http\Env\Request;
use http\Env\Response;

class ProductsController extends Controller
{
    public function list()
    {
        return Product::query()
            ->select(['name', 'description', 'price', 'is_active', 'tags'])
            ->whereIsActive(true)
            ->get();
    }

    public function getProduct(Product $product): array
    {
        return
            [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'isActive' => $product->is_active,
                'tags' => $product->tags
            ];
    }

    public function create(Category $category, CreateRequest $request)
    {

        $product = $category->product()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'is_active' => $request->boolean('is_active'),
        ]);

        return response()->json($this->getProduct($product), 201);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json(array_merge(["status" => true, "data" => $product]));
    }
}
