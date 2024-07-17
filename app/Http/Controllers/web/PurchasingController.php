<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class PurchasingController extends Controller
{
    public function index()
{
    $cartCount = Cart::count();
    $orderCount = Order::count();
    $pendingOrderCount = Order::where('status', 'pending')->count();
    $approvedOrderCount = Order::where('status', 'approved')->count();
    $totalApprovedAmount = Order::where('status', 'approved')->sum('total_amount');

    return view('purchases.purchases', compact('cartCount', 'orderCount', 'pendingOrderCount', 'approvedOrderCount', 'totalApprovedAmount'));
}

}
