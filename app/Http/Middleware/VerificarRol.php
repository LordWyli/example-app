<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if ($request->user() && $request->user()->rol->descripcion == $role) {
            return $next($request);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Acceso denegado'
        ]);
    }
}
