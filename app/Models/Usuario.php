<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $fillable  = [
        'id_usuario',
        'nombre',
        'prim_apellido',
        'seg_apellido',
        'clave_acceso',
        'fecha_registro',
        'id_area',
        'id_rol',
        'estado'
    ];
    protected $hidden = ['clave_acceso'];
    public $timestamps = false;
}
