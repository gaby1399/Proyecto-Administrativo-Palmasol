<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//  return $request->user();
Route::group(['prefix' => 'palmasol'], function () {

    //Rutas auth
    Route::group([
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

    Route::group([
        'prefix' => 'empleado'
    ], function ($router) {
        Route::get('all', [EmpleadoController::class, 'all'])->middleware(['auth:api', 'scopes:administrador']);
        Route::get('', [EmpleadoController::class, 'index'])->middleware(['auth:api', 'scopes:administrador']);
        Route::post('create', [EmpleadoController::class, 'store'])->middleware(['auth:api']);
        Route::patch('update/{id}', [EmpleadoController::class, 'update'])->middleware(['auth:api', 'scopes:administrador']);
        Route::get('/{id}', [EmpleadoController::class, 'show'])->middleware(['auth:api', 'scopes:administrador']);
    });

    Route::group([
        'prefix' => 'cliente'
    ], function ($router) {
        Route::get('all', [ClienteController::class, 'all'])->middleware(['auth:api', 'scopes:administrador']);
        Route::get(
            '',
            [ClienteController::class, 'index']
        )->middleware(['auth:api', 'scopes:administrador']);
        Route::post('create', [ClienteController::class, 'store'])->middleware(['auth:api']);
        Route::patch('update/{id}', [ClienteController::class, 'update'])->middleware(['auth:api', 'scopes:administrador']);
        Route::get('/{id}', [ClienteController::class, 'show'])->middleware(['auth:api', 'scopes:administrador']);
    });
});
