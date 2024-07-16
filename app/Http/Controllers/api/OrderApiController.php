<?php

namespace App\Http\Controllers\Api;

use App\Events\CreateOrderEvent;
use App\Http\Controllers\Web\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class OrderApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {

        if (!$request->has(['orderData'])) {
            return response()->json(['error' => 'Faltan datos en la solicitud.'. $request], 400);
        }

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

        if (!$order) {
            return response()->json(['error' => 'No se pudo crear la orden.'], 500);
        }

        CreateOrderEvent::dispatch($order, $items);

        // Crear preferencia en Mercado Pago
        MercadoPagoConfig::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));
        $client = new PreferenceClient();

        foreach ($items as $item) {
            $formattedItems[] = [
                "title" => $item['name'],
                "quantity" => $item['quantity'],
                "unit_price" => $item['price'],
            ];
        }

        $preference = $client->create([
            "external_reference" => $order->orde_id,
            "items" => $formattedItems,
            "back_urls" => [
            "success" => "https://www.youtube.com/watch?v=s29AsZ4OeC4", // Pasar la URL de éxito a Mercado Pago
        ],
        "auto_return" => "approved",
        "notification_url" => "https://5e46-200-122-104-165.ngrok-free.app/api/mercadopago-notification" // enviar la notificacion a esta url ( cambiar cuando sea necesario)
        ]);

        return response()->json(['init_point' => $preference->init_point], 200);
    }

    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
