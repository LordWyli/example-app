<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$area = Area::all();

        $area = DB::select('select * from vista_areas');

        return response()->json([
            'status' => 'success',
            'message' => $area
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AreaRequest $request)
    {
        $area = Area::create([
            'nombre'=> $request->nombre,
            'descripcion' => $request->descripcion,
            'id_descripcion' => $request->id_descripcion
        ]);

        return response()->json([
            'status'=> 'success',
            'message'=> 'Guardado correctamente'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $area = Area::findOrfail($id);
        return response()->json([
            'status'=> 'success',
            'message'=> $area
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AreaRequest $request, string $id)
    {
        $area = Area::findOrfail($id);

        $area->update([
            'nombre'=> $request->nombre,
            'descripcion' => $request->descripcion,
            'id_descripcion' => $request->id_descripcion
        ]);

        return response()->json([
            'status'=> 'success',
            'message'=> 'Actualizado correctamente'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $area = Area::findOrfail($id);

        $area->delete();

        return response()->json([
            'status'=> 'success',
            'message'=> 'Eliminado correctamente'
        ]);
    }
}
