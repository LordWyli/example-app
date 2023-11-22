<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    protected $fillable = [
        'id_rol',
        'descripcion'
    ];
    public $timestamps = false;
    public function usuarios()
    {
        return $this->hasMany(Usuario::class,'id_rol','id_rol');
    }
}
