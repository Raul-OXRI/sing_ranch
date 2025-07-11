<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()){
            if ($request->expectsJson()) {
                return response()->json(['error' => 'No esta autenticado'], 401);
            }
            return redirect()->route('login')->withErrors(['Auth'=> 'No esta autenticado']);
        }
        
        return $next($request);
    }
}
