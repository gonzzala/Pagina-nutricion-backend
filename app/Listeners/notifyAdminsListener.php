<?php

namespace App\Listeners;

use App\Events\OrderApprovedEvent;
use App\Mail\PurchaseConfirmed;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class notifyAdminsListener
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
    public function handle(OrderApprovedEvent $event): void
    {
        $order = $event->order;
        $items = $event->items;

        try{
        $admins = User::all();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new PurchaseConfirmed($order, $items, $admin->name));
        }
    
    } catch (\Exception $e) {
        Log::error('Error al enviar correo a los administradores:', ['exception' => $e]);
    }
    }
}
