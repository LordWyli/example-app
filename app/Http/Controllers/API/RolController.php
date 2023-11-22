<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol = Rol::all();

        return response()->json([
            'message' => $rol
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = Rol::create([
            'id_rol'=> $request->input('id_rol'),
            'descripcion'=> $request->input('descripcion'),
        ]);

        return response()->json([
            'message' => $rol
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Rol::findOrFail($id);

        return response()->json([
            'message' => $rol
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $descripcion = $request->input('descripcion');

        $rol = Rol::find($id);
        $rol->update(['descripcion' => $descripcion]);

        return response()->json([
            'message'=> $rol,
            'status' => 'Actualizado Correctamente'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Rol::find( $id);
        $rol->delete();

        return response()->json([
            'message' => 'Eliminado correctamente'
        ],200);
    }
}
