<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RegistroAccesoController extends Controller
{
    public function index(){
        $data = DB::select('select * from vista_registro_accesos');
        return response()->json([
            'status' => 'success',
            'data' => $data
        ],200);
    }
}
