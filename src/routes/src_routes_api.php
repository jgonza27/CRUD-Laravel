<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\RealmController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\CreatureController;
use App\Http\Controllers\Api\ArtifactController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas CRUD para personajes (existente)
Route::apiResource('characters', CharacterController::class);

// Rutas CRUD para la colección de Postman "Tierra Media"
Route::apiResource('regions', RegionController::class);
Route::apiResource('realms', RealmController::class);
Route::apiResource('heroes', HeroController::class);
Route::apiResource('creatures', CreatureController::class);
Route::apiResource('artifacts', ArtifactController::class);