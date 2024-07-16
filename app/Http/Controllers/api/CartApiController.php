<?php

namespace App\Http\Controllers\Api;

use App\Events\CreateCartEvent;
use App\Http\Controllers\Web\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartApiController extends Controller
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

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
