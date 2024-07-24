<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderApprovedEvent;
use App\Http\Controllers\Web\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentApiController extends Controller
{
    public function notification(Request $request)
    {
        $eventType = $request->input('type');
    
            if ($eventType === 'payment') {
                $paymentId = $request->input('data.id');
    
                try {
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . env('MERCADOPAGO_ACCESS_TOKEN'),
                    ])->get("https://api.mercadopago.com/v1/payments/{$paymentId}");
    
                    if ($response->ok()) {
                        $data = $response->json();
    
                        $order = Order::latest()->first();

                    if ($order) {
                        $newStatus = $data['status'];
                        $order->status = $newStatus;
                        $order->save();

                        if ($newStatus === 'approved') {
                            OrderApprovedEvent::dispatch($order, $data['additional_info']['items']);
                        }

                        return response()->json(['status' => 'OK'], 200);

                    } else {
                        return response()->json(['status' => 'OK'], 200);
                    }}
                    
                } catch (\Exception $e) {
                    Log::error('Error en la solicitud a Mercado Pago:', ['exception' => $e]);
                    return response()->json(['status' => 'OK'], 200);
                }
            }

        return response()->json(['status' => 'OK'], 200);
    }
}
