<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Página Principal: Muestra la portada de la API (welcome.blade.php)
Route::get('/', function () {
    return view('welcome');
});

// 2. Dashboard: Opcional, pero útil si mantienes usuarios. 
// Lo dejamos apuntando a la vista por defecto de Laravel.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Rutas de Perfil (Autenticación): Las mantenemos por si quieres gestionar usuarios.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. Rutas de autenticación (Login, Registro, etc.)
require __DIR__.'/auth.php';