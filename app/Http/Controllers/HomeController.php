<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Verificar el rol del usuario
        if (auth()->user()->role === 'admin') {
            // Redirigir al dashboard del administrador
            return redirect('/admin/dashboard');
        }

        // Continuar a la vista de inicio para usuarios comunes
        return view('user.home');
    }
}

