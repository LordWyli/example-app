<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Http\Requests\DepartamentoRequest;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamento = Departamento::all();

        return response()->json([
            'status' => 'success',
            'message' => $departamento
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartamentoRequest $request)
    {
        $departamento = Departamento::create([
            'nombre'=> $request->input('nombre'),
            'descripcion'=> $request->input('descripcion'),
        ]);

        return response()->json([
            'status'=> 'success',
            'message'=> 'Guardado correctamente',
            'data'=> $departamento
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departamento = Departamento::findOrFail($id);
        return response()->json([
            'status'=> 'success',
            'message'=> 'Ok',
            'data'=> $departamento
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartamentoRequest $request, string $id)
    {
        $departamento = Departamento::findOrFail($id);

        $departamento->update([
            'nombre'=> $request->input('nombre'),
            'descripcion'=> $request->input('descripcion'),
        ]);

        return response()->json([
            'status'=> 'success',
            'message'=> 'Actualizado correctamente',
            'data'=> $departamento
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return response()->json([
            'status'=> 'success',
            'message'=> 'Recurso eliminado correctamente'
        ]);
    }
}
