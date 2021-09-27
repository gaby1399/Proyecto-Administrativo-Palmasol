<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Validator;
use Input;

class ProveedorController extends Controller
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
            $proveedor = Proveedor::where('estado', true)->orderBy('nombre', 'asc')->get();
            $response = $proveedor;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
    public function all()
    {
        try {
            /*  Listado de proveedores
            */
            $proveedor = Proveedor::orderBy('nombre', 'asc')->get();
            $response = $proveedor;

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
            'id' => 'required|numeric',
            'nombre' => 'required|min:5',
            'telefono' => 'required|numeric',
            'direccion' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 442);
        }
        try {
            //instancia
            $prov = new Proveedor();
            $prov->id = $request->input('id');
            $prov->nombre = $request->input('nombre');
            $prov->telefono = $request->input('telefono');
            $prov->direccion = $request->input('direccion');
            $prov->estado = true;
            //guardar
            if ($prov->save()) {
                $response = 'Proveedor registrado';
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
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //Obtener un producto
            $prov = Proveedor::where('id', $id)->first();
            $response = $prov;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
