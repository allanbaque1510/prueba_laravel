<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CineController;
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

Route::get('/peliculas', [CineController::class,'index']);
Route::post('/agregarPelicula', [CineController::class,'store']);
Route::post('/buscar', [CineController::class,'search']);
Route::post('/modificarPelicula', [CineController::class,'update']);