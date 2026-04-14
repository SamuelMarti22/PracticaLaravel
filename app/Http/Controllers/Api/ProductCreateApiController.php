<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductCreateApiController extends Controller
{
    public function save(Request $request): JsonResponse
    {
        Product::create($request->only(['name', 'price']));

        return redirect()->route('product.create')->with('success', 'Product created successfully!');
    }
}