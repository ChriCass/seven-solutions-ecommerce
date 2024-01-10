<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Models\Course;
use App\Http\Controllers\UserProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Ruta de Bienvenida
Route::get('/', function () {
    $cursos = Course::all(); // Obtener todos los cursos
    return view('welcome', compact('cursos'));
});

// Rutas de Autenticación
Auth::routes();

// Ruta de Inicio
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas para Administradores
Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    // Aquí irían todas tus rutas accesibles solo para administradores
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('admin/courses', AdminController::class);

});

// Rutas para Usuarios Regulares
Route::middleware(['auth', 'checkrole:user'])->group(function () {
    // Aquí irían todas tus rutas accesibles solo para usuarios regulares
    Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
});
