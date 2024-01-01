<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Lógica para el dashboard del administrador
        return view('admin.dashboard');
    }
}

