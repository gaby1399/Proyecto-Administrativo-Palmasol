<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//  return $request->user();
//http://127.0.0.1:8000/api/palmasol
Route::group(['prefix' => 'palmasol'], function () {

    //Rutas auth
    Route::group([
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('registrar', [UsuarioController::class, 'register']);
        Route::post('inicio', [UsuarioController::class, 'login']);
        Route::post('cerrar', [UsuarioController::class, 'logout']);
    });

    Route::group([
        'prefix' => 'empleado'
    ], function ($router) {
       // Route::get('all', [EmpleadoController::class, 'all'])->middleware(['auth:api', 'scopes:administrador']);
        Route::get('', [EmpleadoController::class, 'index']);//->middleware(['auth:api', 'scopes:administrador']);
        Route::post('crear', [EmpleadoController::class, 'store']);//->middleware(['auth:api']);
        Route::patch('modificar/{id}', [EmpleadoController::class, 'update']);//->middleware(['auth:api', 'scopes:administrador']);
        Route::get('/{id}', [EmpleadoController::class, 'show']);//->middleware(['auth:api', 'scopes:administrador']);
    });

    Route::group([
        'prefix' => 'cliente'
    ], function ($router) {
       // Route::get('all', [ClienteController::class, 'all'])->middleware(['auth:api', 'scopes:administrador']);
        Route::get('',[ClienteController::class, 'index']);//->middleware(['auth:api', 'scopes:administrador']);
        Route::post('crear', [ClienteController::class, 'store']);//->middleware(['auth:api']);
        Route::patch('modificar/{id}', [ClienteController::class, 'update']);//->middleware(['auth:api', 'scopes:administrador']);
        Route::get('/{id}', [ClienteController::class, 'show']);//->middleware(['auth:api', 'scopes:administrador']);
    });
});
