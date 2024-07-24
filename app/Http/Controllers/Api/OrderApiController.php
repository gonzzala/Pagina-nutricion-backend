<?php

namespace App\Http\Controllers\Api;

use App\Events\CreateOrderEvent;
use App\Http\Controllers\Web\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class OrderApiController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(OrderRequest $request)
    {
        $data = $request->input('orderData');
        $items = $request->input('orderData.parsedCart');

        $order = Order::create([
            'uuid' => $data['buyerUuid'],
            "total_amount" => $data['totalAmount'],
            'email' => $data['email'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'phone' => $data['telephone'],
            'status' => 'pending',
        ]);
        
        CreateOrderEvent::dispatch($order, $items);

        try {
            $preference = $this->createMercadoPagoPreference($order, $items);
    
            return response()->json(['init_point' => $preference->init_point], 200);
        } catch (\Exception $e) {
            // Manejar la excepción y retornar una respuesta de error
            return response()->json(['error' => 'Error creating MercadoPago preference'], 500);
        }
    }

    private function createMercadoPagoPreference($order, $items)
    {
        MercadoPagoConfig::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));
        $client = new PreferenceClient();

        $formattedItems = [];
        foreach ($items as $item) {
            $formattedItems[] = [
                'title' => $item['name'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
            ];
        }

        return $client->create([
            'external_reference' => $order->order_id,
            'items' => $formattedItems,
            'back_urls' => [
                'success' => "https://www.youtube.com/watch?v=s29AsZ4OeC4", 
            ],
            'auto_return' => 'approved',
            'notification_url' => "https://7d03-200-122-104-165.ngrok-free.app/api/mercadopago-notification",
        ]);
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
