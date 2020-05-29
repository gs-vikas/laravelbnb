<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductShowResource;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function index()
    {
        return ProductIndexResource::collection(
            Product::all()
        );
    }

    public function show($id)
    {
        return new ProductShowResource(Product::findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:36',
            'description' => 'required|max:200',
            'status' => 'required|in:0,1,2,3,4,5'
        ]);
        $product = Product::make($data);
        $product->save();
        return new ProductShowResource($product);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:36',
            'description' => 'required|max:200',
            'status' => 'required|in:1,2,3,4,5'
        ]);

        $product = Product::where('id', $id)->update($data);
        return new ProductShowResource($product);
    }
}
