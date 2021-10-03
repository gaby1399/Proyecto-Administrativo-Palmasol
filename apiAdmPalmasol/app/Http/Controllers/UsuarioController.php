<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = Usuario::all();
            $response = $users;
            return response()->json($response, 200);
        } catch (Exception $e) {
=======
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function all()
    {
        try {

            $usuario = Usuario::orderBy('id', 'asc')->with(['rol'])->get();;
            $response = $usuario;

            return response()->json($response, 200);
        } catch (\Exception $e) {
>>>>>>> 99bc27884dafdadc4614307fbc5026dd22ed0e1a
            return response()->json($e->getMessage(), 422);
        }
    }

<<<<<<< HEAD
=======
    public function delete($id)
    {
        try {

            $usuario = Usuario::where('id', $id)->first();

            if ($usuario->delete()) {
                $response = true;
                return response()->json($response, 200);
            }
            $response = ['msg' => 'Error durante la eliminación'];
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            //validar si sabe la contraseña anterior
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
                'passwordAnterior' => 'required|string|min:6',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->messages(), 422);
            }

            $usuario = Usuario::where('email', $request['email'])->orderBy('id', 'asc')->first();

            if ($usuario == null) {
                $response = false;
                return response()->json($response, 200);
            }


            // $usuario->password = $request->input('password');

            if (Hash::check($request['passwordAnterior'], $usuario->password)) {

                $request['password'] = Hash::make($request['password']);
                $usuario->password = $request->input('password');
            } else {
                $response = false;
                return response()->json($response, 200);
            }

            if ($usuario->update()) {
                $response = 'Contraseña actualizado!';
                return response()->json($response, 200);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
>>>>>>> 99bc27884dafdadc4614307fbc5026dd22ed0e1a
}
