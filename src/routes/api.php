<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Definimos las rutas CRUD
Route::apiResource('regions', \App\Http\Controllers\Api\RegionController::class);
Route::apiResource('realms', \App\Http\Controllers\Api\RealmController::class);
Route::apiResource('heroes', \App\Http\Controllers\Api\HeroController::class);
Route::apiResource('creatures', \App\Http\Controllers\Api\CreatureController::class);
Route::apiResource('artifacts', \App\Http\Controllers\Api\ArtifactController::class);