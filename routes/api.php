<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UsuarioController::class)->group(function (){
    Route::get('/usuarios','index');
    Route::post('/usuario/crear','store');
    Route::get('/usuario/{id}','show');
    Route::patch('/usuario/update/{id}','update');
    Route::delete('/usuario/delete/{id}','destroy');
});
