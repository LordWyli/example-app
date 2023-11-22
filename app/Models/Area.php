<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'area';
    protected $primaryKey = 'id_area';
    protected $fillable = [
        'nombre',
        'descripcion',
        'id_departamento'
    ] ;
    public $timestamps = false;
}
