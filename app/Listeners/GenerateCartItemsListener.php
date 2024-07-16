<?php

namespace App\Listeners;

use App\Events\CreateCartEvent;
use App\Models\CartItem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateCartItemsListener
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
    public function handle(CreateCartEvent $event): void
    {
        $cart = $event->cart;
        $items = $event->items;

        foreach ($items as $item) {
            CartItem::create([
                'cart_id' => $cart->cart_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);
        }
    }
}
