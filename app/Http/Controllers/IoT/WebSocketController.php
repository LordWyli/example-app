<?php

namespace App\Http\Controllers\IoT;

use App\Events\IoTdataEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IoT\SensorMovimiento;
use Illuminate\Support\Facades\DB;
use App\Events\SensorMovimientosEvent;

class WebSocketController extends Controller
{
    public function getData(){

        $data = DB::select('select * from seguridad.vista_sensores_movimiento');

        broadcast(new SensorMovimientosEvent($data));


    }
}
