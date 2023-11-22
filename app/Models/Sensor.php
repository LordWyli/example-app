<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    protected $table = 'tipo_sensor';
    protected $primaryKey = 'id_tipo_sensor';
    protected $fillable = [
        'nombre',
        'descripcion'
    ] ;
    public $timestamps = false;
}
