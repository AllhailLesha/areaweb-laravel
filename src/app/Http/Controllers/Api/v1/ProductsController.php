<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Products\CreateRequest;
use App\Http\Requests\Api\Products\UpdateRequest;
use App\Http\Resources\Products\MinifiedProductResource;
use App\Http\Resources\Products\ProductResource;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use http\Env\Request;
use http\Env\Response;

class ProductsController extends Controller
{
    public function index()
    {
        return MinifiedProductResource::collection(
            Product::query()->whereIsActive(true)->get()
        );
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function store(Category $category, CreateRequest $request)
    {

        $product = $category->product()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'is_active' => $request->boolean('is_active'),
        ]);

        return response()->json($this->show($product), 201);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json(array_merge(["status" => true, "data" => $product]));
    }
}
