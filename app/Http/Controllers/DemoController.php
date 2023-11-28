<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TestEvent;
use App\Models\IoT\SensorMovimiento;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function demo()
    {
        $data = DB::select('select * from vista_sensores_movimiento');

        broadcast(new TestEvent($data));

        return response()->json([
            'success' => true,
            'data' => 'Evento obtenido correctamente'
        ]);
    }
}
