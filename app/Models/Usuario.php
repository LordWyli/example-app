<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Rol;

class Usuario extends Authenticatable
{
    use HasFactory,HasApiTokens;
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
    public function rol()
    {
        return $this->belongsTo(Rol::class,'id_rol','id_rol');
    }
}
