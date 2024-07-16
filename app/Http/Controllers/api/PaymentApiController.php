<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderApprovedEvent;
use App\Http\Controllers\Web\Controller;
use App\Mail\PurchaseConfirmed;
use App\Models\Order;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentApiController extends Controller
{
    public function notification(Request $request)
    {
        /* $xSignature = $request->header('X-Signature');
        $xRequestId = $request->header('X-Request-ID');

        $dataID = $request->query('data.id');

        $parts = explode(',', $xSignature);

        $ts = null;
        $hash = null;

        foreach ($parts as $part) {
            $keyValue = explode('=', $part, 2);
            if (count($keyValue) == 2) {
                $key = trim($keyValue[0]);
                $value = trim($keyValue[1]);
                if ($key === "ts") {
                    $ts = $value;
                } elseif ($key === "v1") {
                    $hash = $value;
                }
            }
        }

        $secret = env('MERCADOPAGO_SECRET_KEY');

        $template = "id:$dataID;request-id:$xRequestId;ts:$ts;";

        $cyphedSignature = hash_hmac('sha256', $template, $secret);

        if ($cyphedSignature === $hash) {
            return response()->json(['status' => 'success'], 200);
        } else {
            Log::info("HMAC verification failed"); 
            return response()->json(['message' => 'HMAC verification failed'], 400);
        } */
       /* $payment = $request->all(); 
        Log::info('Contenido del request:', $payment); 
        return response()->json(['status' => 200], 200);  */



        
            // Obtener el tipo de evento (puede ser payment, entre otros)
            $eventType = $request->input('type');
    
            // Verificar que el evento sea de tipo 'payment'
            if ($eventType === 'payment') {
                // Obtener el ID del pago desde el query string o directamente
                $paymentId = $request->input('data.id');
    
                try {
                    // Realizar una solicitud a Mercado Pago para obtener los detalles del pago
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . env('MERCADOPAGO_ACCESS_TOKEN'),
                    ])->get("https://api.mercadopago.com/v1/payments/{$paymentId}");
    
                    if ($response->ok()) {
                        $data = $response->json();
                        Log::info('Detalles del pago recibido:', $data);
    
                        $order = Order::latest()->first();

                    if ($order) {
                        // Actualizar el estado de la orden basado en el estado recibido de Mercado Pago
                        $newStatus = $data['status'];
                        $order->status = $newStatus;
                        $order->save();
                        Log::info('Orden actualizada - ID:', ['order_id' => $order->order_id, 'new_status' => $newStatus]);


                        if ($newStatus === 'approved') {
                            $items = $data['additional_info']['items'];
                            $admins = User::all();
                            Log::info('el status es approved, vamos a mandar el mail');
                            /* foreach($admins as $admin){
                            Mail::to($admin->email)->send(new PurchaseConfirmed($order, $items, $admin->name));
                            } */
                            OrderApprovedEvent::dispatch($order);
                        }

                        

                        
                        
                        return response()->json(['status' => 'OK'], 200);
                    } else {
                        Log::error('Error al obtener detalles del pago:', ['status' => $response->status()]);
                        return response()->json(['status' => 'OK'], 200);
                    }}
                } catch (\Exception $e) {
                    Log::error('Error en la solicitud a Mercado Pago:', ['exception' => $e]);
                    return response()->json(['status' => 'OK'], 200);
                }
            }
    
            // Si el tipo de evento no es 'payment', simplemente responder con éxito
            return response()->json(['status' => 'OK'], 200);
        
    }
}
