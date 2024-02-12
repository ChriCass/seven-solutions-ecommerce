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
    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Rutas para la gestión de cursos
    Route::get('admin/courses', [AdminController::class, 'indexCourses'])->name('admin.courses.index');
    Route::get('admin/courses/create', [AdminController::class, 'createCourse'])->name('admin.courses.create');
    Route::post('admin/courses', [AdminController::class, 'storeCourse'])->name('admin.courses.store');
    Route::get('/admin/courses/{course}/edit', [AdminController::class, 'editCourse'])->name('admin.courses.edit');
    Route::put('admin/courses/{course}', [AdminController::class, 'updateCourse'])->name('admin.courses.update');
    Route::delete('admin/courses/{course}', [AdminController::class, 'destroyCourse'])->name('admin.courses.destroy');

    // Rutas para la gestión de usuarios
    Route::get('admin/users', [AdminController::class, 'indexUsers'])->name('admin.users.index');
    Route::get('admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
});
// Rutas para Usuarios Regulares
Route::middleware(['auth', 'checkrole:user'])->group(function () {
    // Aquí irían todas tus rutas accesibles solo para usuarios regulares
    Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
});
