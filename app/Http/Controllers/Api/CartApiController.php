<?php

namespace App\Http\Controllers\Api;

use App\Events\CreateCartEvent;
use App\Http\Controllers\Web\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function store(CartRequest $request)
    {
        $buyerUuid = $request->input('buyerUuid');
        $items = $request->input('cart');

        $existingCart = Cart::where('uuid', $buyerUuid)->first();

            if ($existingCart) {
                $existingCart->delete();
            }

        $cart = new Cart();
        $cart->uuid = $buyerUuid;
        $cart->save(); 

        CreateCartEvent::dispatch($cart, $items);

        return response()->json(['message' => 'Cart saved successfully'], 200);
    }


    public function show(Cart $cart)
    {
        //
    }

    public function edit(Cart $cart)
    {
        //
    }

    public function update(Request $request, Cart $cart)
    {
        //
    }

    public function destroy(Cart $cart)
    {
        //
    }
}
