<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SensorMovimientoController extends Controller
{
    public function index()
    {
        $data = DB::select('select * from vista_sensores_movimiento');
        return response()->json([
            'status' => 'success',
            'data' => $data
        ],200);
    }
}
