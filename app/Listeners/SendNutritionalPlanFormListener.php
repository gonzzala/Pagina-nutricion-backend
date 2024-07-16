<?php

namespace App\Listeners;

use App\Mail\NutritionalPlanForm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNutritionalPlanFormListener
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
    public function handle(object $event): void
    {
        $formLink = 'https://forms.gle/fCLL4boBbLCeQuXC6';

        $order = $event->order;

        $orderItems = $order->items;

        foreach ($orderItems as $item) {
            if ($item->product->category->category == 'Nutricional') {
                Log::info('la categoria es nutricional, vamos a mandar el mail');
                // Enviar correo al cliente con el formulario
                Mail::to($order->email)->send(new NutritionalPlanForm($order, $formLink));
            }
        }


    }
}
