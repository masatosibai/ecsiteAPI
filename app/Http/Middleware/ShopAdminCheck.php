<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShopAdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( $request->header("Authorization") != 2) {
            return response()->json(["message" => "権限管理エラ-"], 404);
        }
        return $next($request);
    }
}
