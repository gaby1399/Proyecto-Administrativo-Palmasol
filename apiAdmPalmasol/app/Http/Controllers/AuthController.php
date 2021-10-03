<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        //Reglas de validación
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6',
            'rol_id' => 'required',
        ]);
        //Retornar mensajes de validación
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try {
            //Formato de password
            // $request['password'] = $request['contraseña'];
            $request['password'] = Hash::make($request['password']);
            $request['remember_token'] = Str::random(10);
            //Agregar rol_id en Model User a la propiedad $fillable
            $user = Usuario::create($request->toArray());
        
            Auth::login($user);
            $scope = $user->rol->descripcion;
            $token = $user->createToken($user->email . '-' . now(), [$scope]);
            //Respuesta con token
            $response = [
                'user' => Auth::user(),
                'token' => $token->accessToken
                       ];

            return
                response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function login(Request $request)
    {
        //Validar campos de login
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);


        //Retornar mensajes de validación
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try {
            //$request['password'] = $request['contraseña'];
            //Credenciales para el login
            $credentials = $request->only('email', 'password');
            //Verificar credenciales por medio de las funcionalidad de autenticación
            if (Auth::attempt($credentials)) {
                $user = Usuario::where('email', $request->email)->with('rol')->first();
                $scope = $user->rol->descripcion;
                $token = $user->createToken($user->email . '-' . now(), [$scope]);

                $response = [
                    'user' => Auth::user(),
                    'token' => $token->accessToken
                ];
                return
                    $response = ["Login correcto"];
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
