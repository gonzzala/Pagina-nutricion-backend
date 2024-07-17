<?php

namespace App\Listeners;

use App\Events\CreateProductEvent;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveProductImagesListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateProductEvent $event): void
    {
        if ($event->images) {
            foreach ($event->images as $image) {
                $uniqueFileName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                $imagePath = $image->storeAs('products', $uniqueFileName, 'public');

                $productImage = new ProductImage();
                $productImage->product_id = $event->product->product_id;
                $productImage->image_path = $imagePath;
                $productImage->save();
            }
        }
    }
}
