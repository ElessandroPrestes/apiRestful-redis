<?php

use App\Http\Controllers\Api\CastController;
use App\Http\Controllers\Api\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::apiResource('/films/{film}/casts', CastController::class);

Route::put('/films/{film}', [FilmController::class, 'update']);
Route::delete('/films/{id}', [FilmController::class, 'destroy']);
Route::get('/films/{id}', [FilmController::class, 'show']);
Route::post('/films', [FilmController::class, 'store']);
Route::get('/films', [FilmController::class, 'index']);


Route::get('/', function(){
    return response()->json(['message' => 'API']);
});
