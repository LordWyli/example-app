<?php

namespace App\Models\IoT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
