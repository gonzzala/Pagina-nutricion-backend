<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class LimitOrdersByIp
{
    const ORDER_LIMIT = 5; // Límite de órdenes permitido por IP
    const EXPIRATION = 86400; // Expiración del contador en segundos (1 día)

    public function handle(Request $request, Closure $next): Response
    {
         $ip = $request->ip();
        $orderCount = Cache::get($ip, 0);

        if ($orderCount >= self::ORDER_LIMIT) {
            return response()->json(['error' => 'Order limit reached'], 429);
        }

        Cache::put($ip, $orderCount + 1, self::EXPIRATION);

        return $next($request);
    }
}
