<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
    public function list()
    {
        return Product::query()
            ->select(['name', 'description', 'price', 'is_active', 'tags'])
            ->whereIsActive(true)
            ->get();
    }

    public function getProduct(Product $product)
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
}
