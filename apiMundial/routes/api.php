<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\Eventocontroller;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\PartidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["middleware" => "auth:sanctum"], function () {
    Route::delete('/equipos/{id}', [EquipoController::class, 'destroy']);
    Route::delete('/partidos/{id}', [PartidoController::class, 'destroy']);
    Route::delete('/grupos/{id}', [GrupoController::class, 'destroy']);
    Route::delete('/eventos/{id}', [Eventocontroller::class, 'destroy']);
    Route::post('/eventos', [Eventocontroller::class, 'store']);
    Route::post('/equipos', [EquipoController::class, 'store']);
    Route::post('/xxx/{id}', [FotoController::class, 'store']);
    Route::post('/partidos', [PartidoController::class, 'store']);
    Route::post('/grupos', [GrupoController::class, 'store']);
    Route::put('/grupos/{id}', [GrupoController::class, 'update']);
    Route::put('/equipos/{id}', [EquipoController::class, 'update']);
    Route::put('/eventos/{id}', [Eventocontroller::class, 'update']);
    Route::put('/partidos/{id}', [PartidoController::class, 'update']);
    Route::post('/grupos', [GrupoController::class, 'store']);
});
//Route::delete('/equipos/{id}', [EquipoController::class, 'destroy']);
//Route::delete('/partidos/{id}', [PartidoController::class, 'destroy']);
//Route::delete('/grupos/{id}', [GrupoController::class, 'destroy']);
//Route::delete('/eventos/{id}', [Eventocontroller::class, 'destroy']);
//Route::post('/eventos', [Eventocontroller::class, 'store']);
//Route::post('/equipos', [EquipoController::class, 'store']);
//Route::post('/xxx/{id}', [FotoController::class, 'store']);
//Route::post('/partidos', [PartidoController::class, 'store']);


Route::get('/equipos', [EquipoController::class, 'index'])->name('index');
Route::get('/equipos/{id}', [EquipoController::class, 'show']);
Route::put('/equipos/{id}', [EquipoController::class, 'update']);

Route::get('/equipo/random', [EquipoController::class, 'rand']);
//postphoto

Route::get('/grupo/{id}/puntuacion/', [EquipoController::class, 'devolverTabla']);


Route::get('/partidos', [PartidoController::class, 'index']);
Route::get('/partidos/equipos/{id}', [PartidoController::class, 'partidosDelEquipo']);
Route::get('/partidos/equipos/contar/{id}', [PartidoController::class, 'partidosDelEquipoContar']);

Route::get('/partidoRandom', [PartidoController::class, 'rand']);
Route::get('/partidosenCurso', [PartidoController::class, 'enCurso']);
Route::get('/partidosTerminados', [PartidoController::class, 'finalizados']);
Route::get('/partidosSinEmpezar', [PartidoController::class, 'sinEmpezar']);

Route::get('/partidos/{id}', [PartidoController::class, 'show']);


//route post


Route::get('/eventos', [Eventocontroller::class, 'index']);
Route::get('/eventos/{id}', [Eventocontroller::class, 'show']);


Route::get('/grupos', [GrupoController::class, 'index']);
Route::get('/grupos/partidos/{id}', [GrupoController::class, 'partidos']);
Route::get('/grupos/{id}', [GrupoController::class, 'show']);
//delete


Route::post("/auth/login", [AuthController::class, "login"])->name("auth.login");
Route::post("/auth/register", [AuthController::class, "register"])->name("auth.register");

