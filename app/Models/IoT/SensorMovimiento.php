<?php

namespace App\Models\IoT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\SensorMovimientoObserver;

class SensorMovimiento extends Model
{
    use HasFactory;
    protected $table = 'sensor_movimiento';
    protected $primaryKey = 'id_sensor';
    protected $fillable = [
        'id_sensor',
        'fecha_hora',
        'estado'
    ];
    protected static function boot()
    {
        parent::boot();
        static::observe(SensorMovimientoObserver::class);
    }
}
