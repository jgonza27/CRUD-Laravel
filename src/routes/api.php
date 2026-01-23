<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Definimos las rutas CRUD
Route::post('/battles', [\App\Http\Controllers\Api\BattleController::class, 'battle']);
Route::get('/realms/{id}/stats', [\App\Http\Controllers\Api\RealmController::class, 'stats']);

Route::apiResource('regions', \App\Http\Controllers\Api\RegionController::class);
Route::get('/regions/{id}/creatures', [\App\Http\Controllers\Api\RegionController::class, 'getCreatures']);

Route::apiResource('realms', \App\Http\Controllers\Api\RealmController::class);
Route::get('/realms/{id}/heroes', [\App\Http\Controllers\Api\RealmController::class, 'getHeroes']);

Route::get('/heroes/search', [\App\Http\Controllers\Api\HeroController::class, 'search']);
Route::get('/heroes/alive', [\App\Http\Controllers\Api\HeroController::class, 'getAlive']);
Route::apiResource('heroes', \App\Http\Controllers\Api\HeroController::class);
Route::get('/heroes/{id}/artifacts', [\App\Http\Controllers\Api\HeroController::class, 'getArtifacts']);

Route::get('/creatures/dangerous', [\App\Http\Controllers\Api\CreatureController::class, 'getDangerous']);
Route::apiResource('creatures', \App\Http\Controllers\Api\CreatureController::class);

Route::get('/artifacts/top', [\App\Http\Controllers\Api\ArtifactController::class, 'getTop']);
Route::apiResource('artifacts', \App\Http\Controllers\Api\ArtifactController::class);
Route::get('/artifacts/{id}/heroes', [\App\Http\Controllers\Api\ArtifactController::class, 'getHeroes']);
Route::post('/artifact-hero', [\App\Http\Controllers\Api\ArtifactController::class, 'attachHero']);
Route::delete('/artifact-hero', [\App\Http\Controllers\Api\ArtifactController::class, 'detachHero']);