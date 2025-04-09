<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthApiMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => 'unauthenticated',
                'message' => 'Silakan login terlebih dahulu (token tidak valid atau tidak ada).'
            ], 401);
        }

        $request->setUserResolver(fn() => $user);

        return $next($request);
    }
}
