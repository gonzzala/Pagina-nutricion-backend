<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();

        foreach ($products as $product) {
            foreach ($product->images as $image) {
                $image->image_url = asset('storage/' . $image->image_path);
            }
        }
        
        return response()->json($products, 200);
    }

    public function show($product_id)
    {
        $product = Product::findOrFail($product_id)->with('images')
        ->where("product_id", '=', $product_id)
        ->get();

        foreach ($product as $product) {
            foreach ($product->images as $image) {
                $image->image_url = asset('storage/' . $image->image_path);
            }
        }

        return response()->json($product, 200);
    }

}
