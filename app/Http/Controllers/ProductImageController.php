<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImageRequest;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function store(ProductImageRequest $request, $product_id)
    {
        if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $uniqueFileName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('products', $uniqueFileName, 'public');

            $productImage = new ProductImage();
            $productImage->product_id = $product_id;
            $productImage->image_path = $imagePath; 
            $productImage->save();
            }
        }
        return redirect()->route('products.create')->with('success', 'Imagen guardada correctamente.');
    }

    public function destroy($productimage_id)
    {
        $productImage = ProductImage::where('productimage_id', $productimage_id)->first();

        if ($productImage) {
            $imagePath = $productImage->image_path;
            $storagePath = 'public/' . $imagePath;
    
            if (Storage::exists($storagePath)) {
                Storage::delete($storagePath);
            } 
            $productImage->delete();
        }

        return redirect()->route('products.create')->with('success', 'Imagen eliminada correctamente.');
    }
}
