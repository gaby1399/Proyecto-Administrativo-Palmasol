<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function all()
    {
        try {

            $usuario = Usuario::orderBy('email', 'asc')->get();
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function delete($id)
    {
        try {

            $usuario = Usuario::where('id', $id)->first();

            if ($usuario->delete()) {
                $response = 'Usuario eliminado!';
                return response()->json($response, 200);
            }
            $response = ['msg' => 'Error durante la eliminación'];
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $cliente = Cliente::find($id);
        $cliente->nombre = $request->input('nombre');

        if ($cliente->update()) {
            $response = 'Contraseña actualizado!';
            return response()->json($response, 200);
        }
        $response = ['msg' => 'Error durante la actulización'];
    }
}
