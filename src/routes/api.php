<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CharacterController; // <--- Importante: Añadir esta línea

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Definimos las rutas CRUD para los personajes
Route::apiResource('characters', CharacterController::class);