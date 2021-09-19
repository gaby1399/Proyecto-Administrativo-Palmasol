<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'id' => 'required|string|max:10',
            'contraseña' => 'required|string|min:8',
        ]);
        //Retornar mensajes de validación
        if ($validacion->fails()) {
            return response()->json($validacion->messages(), 422);
        }

        try {
            //Credenciales para el login
            $credentials = $request->only('id', 'contraseña');
            //Verificar credenciales por medio de las funcionalidad de autenticación
            if (Auth::attempt($credentials)) {
                $usuario = Usuario::where('id', $request->id)->with('rol')->first();
                $scope = $usuario->rol->description;
                $token = $usuario->createToken($usuario->id . '-' . now(), [$scope]);

                $response = [
                    'usuario' => Auth::usuario(),
                    'token' => $token->accessToken
                ];
                return
                    response()->json($response, 200);
            } else {
                $response = ["message" => 'El usuario no existe'];
                return
                    response()->json($response, 422);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
    public function logout()
    {
        //Verificar que exista algún usuario logueado
        //Según el token proporcionado
        if (Auth::guard('api')->check()) {
            Auth::logout();
            $response = ['message' => 'Ha sido desconectado exitosamente!'];
            return response()->json($response, 200);
        } else {
            $response = ['message' => 'No existe usuario autenticado'];
            return response()->json($response, 422);
        }
    }
}
