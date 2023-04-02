<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\FotosController;
use App\Http\Controllers\NovedadesController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/** Authenticacion  */
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/** Persona  */
Route::apiResource('persona', PersonaController::class)->middleware('auth:api');
// Route::apiResource('persona', PersonaController::class)->middleware('auth:api');

/** Fotos  */
Route::apiResource('foto', FotosController::class)->middleware('auth:api');
Route::get('/foto/persona/{id}', [FotosController::class, 'showByIdPersona'])->middleware('auth:api');
Route::post('/foto/persona', [FotosController::class, 'storeFotoUpdatePersona'])->middleware('auth:api');

/** Novedades */
Route::get('/novedades', [NovedadesController::class, 'index'])->middleware('auth:api');
