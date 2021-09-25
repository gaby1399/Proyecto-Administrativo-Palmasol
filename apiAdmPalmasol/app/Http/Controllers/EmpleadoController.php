<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            //where('state', true)
            $product = Empleado::orderBy('nombre', 'asc')->get();
            $response = $product;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|max:10',
            'nombre' => 'required|min:5',
            'telefono' => 'required|numeric',
            'direccion' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 442);
        }
        try {
            //instancia
            $empleado = new Empleado();
            $empleado->id = $request->input('id');
            $empleado->nombre = $request->input('nombre');
            $empleado->telefono = $request->input('telefono');
            $empleado->direccion = $request->input('direccion');
            // $empleado->status = 1;
            //guardar
            if ($empleado->save()) {
                $response = 'Empleado creado';
                return response()->json($response, 201);
            } else {
                $response = 'Error durante la creación';
                return response()->json($response, 404);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            //where('state', true)
            $empleado = Empleado::where('id', $id)->orderBy('nombre', 'asc')->get();
            $response = $empleado;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:5',
            'telefono' => 'required|numeric',
            'direccion' => 'required|min:5'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $empleado = Empleado::find($id);
        $empleado->nombre = $request->input('nombre');
        $empleado->telefono = $request->input('telefono');
        $empleado->direccion = $request->input('direccion');

        if ($empleado->update()) {
            $response = 'Empleado actualizado!';
            return response()->json($response, 200);
        }
        $response = ['msg' => 'Error durante la actulización'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
