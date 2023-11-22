<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user  = DB::select('select * from vista_usuarios');

        return response()->json([
            'status' => 200,
            'data' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {

        $usuario = Usuario::create([
            'id_usuario' => $request->id_usuario,
            'nombre' => $request->nombre,
            'prim_apellido' => $request->prim_apellido,
            'seg_apellido' => $request->seg_apellido,
            'clave_acceso' => Hash::make($request->clave_acceso),
            'fecha_registro' => $request->fecha_registro,
            'id_area' => $request->id_area,
            'id_rol' => $request->id_rol,
            'estado' => $request->estado
        ]);

        return response()->json([
           'status' => 200,
            'data' => $usuario
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);

        return response()->json([
           'message' => $usuario
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);

        $usuario->update([
            'nombre'=> $request->nombre,
            'prim_apellido'=> $request->prim_apellido,
            'seg_apellido'=> $request->seg_apellido,
            'clave_acceso'=> Hash::make($request->clave_acceso),
            'id_area'=> $request->id_area,
            'id_rol'=> $request->id_rol,
            'estado'=> $request->estado
        ]);

        return response()->json([
            'status'=> 'success',
            'message' => 'Usuario actualizado correctamente',
            'data' => $usuario
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();

        return response()->json([
           'message' => 'Usuario eliminado correctamente'
        ],200);
    }
}
