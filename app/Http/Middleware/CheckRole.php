<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  // Rol requerido
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Verifica si el usuario está autenticado y si tiene el rol requerido
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Aquí puedes redirigir al usuario o mostrar un error
            return redirect('/'); // Ejemplo: Redirige a la página principal
        }

        return $next($request);
    }
}
