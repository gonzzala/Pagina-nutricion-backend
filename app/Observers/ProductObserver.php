<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleting(Product $product): void
    {
        $productImages = ProductImage::where('product_id', $product->product_id)->get();
        foreach ($productImages as $productImage) {
            $imagePath = 'public/' . $productImage->image_path;
    
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
            
            $productImage->delete();
        }
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
