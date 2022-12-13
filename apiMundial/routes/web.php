<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\Eventocontroller;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\PartidoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['cors'])->group(function () {

    Route::name('equipos.')->group(function () {

        Route::get('/equipos', [EquipoController::class, 'index']) ->name('index');
        Route::get('/equipos/{id}', [EquipoController::class, 'show']);
        Route::post('/equipos', [EquipoController::class, 'store']);
        Route::put('/equipos/{id}', [EquipoController::class, 'update']);
        Route::delete('/equipos/{id}', [EquipoController::class, 'destroy']);

        Route::get('/equipo/random',[EquipoController::class,'rand']);

        Route::get('/grupo/{id}/puntuacion/',[EquipoController::class,'devolverTabla']);

        Route::post('/xxx', [EquipoController::class, 'subirFoto']);


    });
    Route::name('partidos.')->group(function () {
        Route::get('/partidos', [PartidoController::class, 'index']);
        Route::get('/partidos/{id}', [PartidoController::class, 'show']);
        Route::get('/partidos/equipos/{id}', [PartidoController::class, 'partidosDelEquipo']);
        Route::get('/partidos/equipos/contar/{id}', [PartidoController::class, 'partidosDelEquipoContar']);

        Route::get('/partidoRandom',[PartidoController::class,'rand']);
        Route::get('/partidosenCurso',[PartidoController::class,'enCurso']);
        Route::get('/partidosTerminados',[PartidoController::class,'finalizados']);
        Route::get('/partidosSinEmpezar',[PartidoController::class,'sinEmpezar']);


        //route post
        Route::post('/partidos', [PartidoController::class, 'store']);


    });

    Route::name('eventos.')->group(function () {

        Route::get('/eventos', [Eventocontroller::class, 'index']);
        Route::get('/eventos/{id}', [Eventocontroller::class, 'show']);


    });

    Route::name('grupos.')->group(function () {
        Route::get('/grupos', [GrupoController::class, 'index']);
        Route::get('/grupos/partidos/{id}', [GrupoController::class, 'partidos']);
        Route::get('/grupos/{id}', [GrupoController::class, 'show']);
        Route::post('/grupos', [GrupoController::class, 'store']);
        //delete
        Route::delete('/grupos/{id}', [GrupoController::class, 'destroy']);
    });


});


