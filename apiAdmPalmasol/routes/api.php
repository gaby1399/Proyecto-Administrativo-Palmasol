<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProveedorController;
<<<<<<< HEAD
use App\Http\Controllers\UsuarioController;

=======
use App\Http\Controllers\RolController;
>>>>>>> 99bc27884dafdadc4614307fbc5026dd22ed0e1a
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
        Route::post('registrar', [AuthController::class, 'register']);
        Route::post('inicio', [AuthController::class, 'login']);
        Route::post('cerrar', [AuthController::class, 'logout']);
    });

    Route::group([
        'prefix' => 'usuario'
    ], function ($router) {
        Route::get('todos', [UsuarioController::class, 'all']);
        Route::post('actualizar', [UsuarioController::class, 'updatePassword']);
        Route::delete('eliminar/{id}', [UsuarioController::class, 'delete']);
    });

    Route::group([
        'prefix' => 'rol'
    ], function ($router) {
        Route::get('', [RolController::class, 'index']);
    });

    Route::group([
        'prefix' => 'empleado'
    ], function ($router) {
        Route::get('todos', [EmpleadoController::class, 'all']);
        //->middleware(['auth:api', 'scopes:administrador']);
        Route::get('', [EmpleadoController::class, 'index']); //->middleware(['auth:api', 'scopes:administrador']);
        Route::post('crear', [EmpleadoController::class, 'store']); //->middleware(['auth:api']);
        Route::patch('modificar/{id}', [EmpleadoController::class, 'update']); //->middleware(['auth:api', 'scopes:administrador']);
        Route::get('/{id}', [EmpleadoController::class, 'show']); //->middleware(['auth:api', 'scopes:administrador']);
    });

    Route::group([
        'prefix' => 'cliente'
    ], function ($router) {
        Route::get('todos', [ClienteController::class, 'all']);
        //->middleware(['auth:api', 'scopes:administrador']);
        Route::get('', [ClienteController::class, 'index']); //->middleware(['auth:api', 'scopes:administrador']);
        Route::post('crear', [ClienteController::class, 'store']); //->middleware(['auth:api']);
        Route::patch('modificar/{id}', [ClienteController::class, 'update']); //->middleware(['auth:api', 'scopes:administrador']);
        Route::get('/{id}', [ClienteController::class, 'show']); //->middleware(['auth:api', 'scopes:administrador']);
    });

    Route::group(['prefix' => 'material'], function ($router) {
        Route::get('', [MaterialController::class, 'index']);
        Route::get(
            'all',
            [MaterialController::class, 'all']
        );
        Route::post('', [MaterialController::class, 'store']);
        Route::patch(
            '/{id}',
            [
                MaterialController::class,
                'update'
            ]
        );
        Route::get('/{id}', [MaterialController::class, 'show']);
    });


    Route::group(['prefix' => 'proveedor'], function ($router) {
        Route::get('', [ProveedorController::class, 'index']);
        Route::get(
            'all',
            [ProveedorController::class, 'all']
        );
        Route::post('', [ProveedorController::class, 'store']);
        Route::patch(
            '/{id}',
            [
                ProveedorController::class,
                'update'
            ]
        );
        Route::get('/{id}', [ProveedorController::class, 'show']);
    });
<<<<<<< HEAD
    Route::group(['prefix' => 'usuario'], function ($router) {
        Route::get('', [UsuarioController::class, 'index']);
    });

=======
>>>>>>> 99bc27884dafdadc4614307fbc5026dd22ed0e1a
});
