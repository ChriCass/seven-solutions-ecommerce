<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
{
    // Obtiene el rol del usuario autenticado
    $role = auth()->user()->role;

    // Redirige según el rol
    switch ($role) {
        case 'admin':
            return '/admin/dashboard'; // Ruta del dashboard de administrador
        case 'user':
            return '/home'; // Ruta para usuarios regulares
        default:
            return '/'; // Ruta por defecto si no se cumple ninguna condición anterior
    }
}

}
