<?php

namespace App\Observers;
use App\Models\IoT\SensorMovimiento;
use App\Events\IoTdataEvent;

class SensorMovimientoObserver
{
    public function created(SensorMovimiento $sensor)
    {
        $this->emitEvento();
    }
    public function updated(SensorMovimiento $sensor)
    {

        $this->emitEvento();
    }
    public function deleted(SensorMovimiento $sensor)
    {
        $this->emitEvento();
    }
    public function emitEvento()
    {
        $datos = SensorMovimiento::all();
        broadcast(new IoTdataEvent($datos))->toOthers();
    }
}
