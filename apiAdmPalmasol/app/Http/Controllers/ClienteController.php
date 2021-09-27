<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
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
            $cliente = Cliente::where('estado', true)->orderBy('nombre', 'asc')->get();
            $response = $cliente;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function all()
    {
        try {

            $cliente = Cliente::orderBy('nombre', 'asc')->get();
            $response = $cliente;

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
            $cliente = new Cliente();
            $cliente->id = $request->input('id');
            $cliente->nombre = $request->input('nombre');
            $cliente->telefono = $request->input('telefono');
            $cliente->direccion = $request->input('direccion');
            $cliente->estado = 1;
            //guardar
            if ($cliente->save()) {
                $response = 'Cliente registrado';
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
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            //where('state', true)
            $cliente = Cliente::where('id', $id)->orderBy('nombre', 'asc')->first();
            $response = $cliente;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
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
        $cliente = Cliente::find($id);
        $cliente->nombre = $request->input('nombre');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');

        if ($cliente->update()) {
            $response = 'Cliente actualizado!';
            return response()->json($response, 200);
        }
        $response = ['msg' => 'Error durante la actulización'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
