<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use App\Http\Requests\TipoSensorRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TipoSensorController extends Controller
{
    public function index()
    {
        $tipo_sensor = Sensor::all();
        return response()->json([
            'status' => 'true',
            'message' => $tipo_sensor
        ],200);
    }
    public function store(TipoSensorRequest $request)
    {
        $tipo_sensor = Sensor::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Guardado correctamente'
        ],200);
    }
    public function show($id)
    {
        try {
            $tipo_sensor = Sensor::findOrFail($id);

            return response()->json([
                'status'=> 'true',
                'message'=> $tipo_sensor
            ],200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Not found resource'
            ],404);
        }

    }
    public function update(TipoSensorRequest $request, $id)
    {
        $tipo_sensor = Sensor::findOrFail($id);

        $nombre = $request->nombre;
        $descripcion = $request->descripcion;

        $tipo_sensor->nombre = $nombre;
        $tipo_sensor->descripcion = $descripcion;

        $tipo_sensor->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Actualizado Correctamente'
        ],200);
    }
    public function destroy($id)
    {
        $tipo_sensor = Sensor::findOrFail($id);
        $tipo_sensor->delete();
        return response()->json([
            'status'=> 'success',
            'message'=> 'Eliminado correctamente'
        ]);
    }
}
