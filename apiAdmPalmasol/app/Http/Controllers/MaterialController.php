<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Validator;
use Input;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
        try {
>>>>>>> 0627be479b490ba4119c177e959fa24094889b5f

            //where('state', true)
            $material = Material::where('estado', true)->orderBy('nombre', 'asc')-> with(["proveedor"])->get();
            $response = $material;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
<<<<<<< HEAD
=======
        try {

            //where('state', true)
            $material = Material::where('estado', true)->orderBy('nombre', 'asc')->with(["proveedor"])->get();
            $response = $material;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

>>>>>>> Gaby
=======

>>>>>>> 0627be479b490ba4119c177e959fa24094889b5f
    public function all()
    {
        try {
            /*  Listado de materiales
            */
<<<<<<< HEAD
<<<<<<< HEAD
            $materiales = Material::where('estado', true)->orderBy('nombre', 'asc')->with(["proveedor"])->get();
=======
            $materiales = Material::orderBy('nombre', 'asc')->with(["proveedor"])->get();
>>>>>>> Gaby
=======
            $materiales = Material::orderBy('nombre', 'asc')->with(["proveedor"])->get();
>>>>>>> 0627be479b490ba4119c177e959fa24094889b5f
            $response = $materiales;

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
            'costo' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 442);
        }
        try {
            //instancia
            $mat = new Material();
            $mat->id = $request->input('id');
            $mat->nombre = $request->input('nombre');
            $mat->costo = $request->input('costo');
            $mat->proveedor_id = $request->input('proveedor_id');
            $mat->estado = true;
            //guardar
            if ($mat->save()) {
                $response = 'Material registrado';
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
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //Obtener un producto
<<<<<<< HEAD
            $mat = Material::where('id', $id)->with(["proveedor",])->first();
=======
            $mat = Material::where('id', $id)->with(["proveedor", ])->first();
>>>>>>> 0627be479b490ba4119c177e959fa24094889b5f
            $response = $mat;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->input('id');
        $mat = Material::find($id);
<<<<<<< HEAD
        $mat->nombre = $request->input('nombre');
=======
        $mat->nombre =$request->input('nombre');
>>>>>>> 0627be479b490ba4119c177e959fa24094889b5f
        $mat->costo = $request->input('costo');
        $mat->estado = $request->input('estado');
        $mat->proveedor_id = $request->input('proveedor_id');
        $mat->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
