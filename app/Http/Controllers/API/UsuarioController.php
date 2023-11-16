<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return response()->json([
            'status' => 200,
            'data' => $usuarios
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
    public function update(Request $request, string $id)
    {
        $nombre = $request->nombre;
        $prim_apellido = $request->prim_apellido;
        $seg_apellido = $request->seg_apellido;
        $clave_acceso = $request->clave_acceso;
        $id_area = $request->id_area;
        $id_rol = $request->id_rol;
        $estado = $request->estado;

        $updateUsuario = Usuario::find($id);
        $updateUsuario->update(['nombre' => $nombre]);
        $updateUsuario->update(['prim_apellido' => $prim_apellido]);
        $updateUsuario->update(['seg_apellido' => $seg_apellido]);
        $updateUsuario->update(['clave_acceso' => $clave_acceso]);
        $updateUsuario->update(['id_area' => $id_area]);
        $updateUsuario->update(['id_rol' => $id_rol]);
        $updateUsuario->update(['estado' => $estado]);

        return response()->json([
            'message' => 'Usuario actualizado correctamente'
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
