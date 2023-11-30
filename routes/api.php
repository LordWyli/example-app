<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\API\TipoSensorController;
use App\Http\Controllers\API\AreaController;
use App\Http\Controllers\API\DepartamentoController;
use App\Http\Controllers\API\RolController;
use App\Http\Controllers\IoT\WebSocketController;
use App\Http\Controllers\API\RegistroAccesoController;
use App\Http\Controllers\API\SensorMovimientoController;


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

Route::get('/login',[AuthenticationController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::group(['prefix'=> 'usuario'], function (){
        Route::get('/',[UsuarioController::class,'index']);
        Route::get('/{id}',[UsuarioController::class,'show']);
        Route::group(['middleware'=> 'verificarRol:Administrador'], function (){
            Route::post('/',[UsuarioController::class,'store']);
            Route::patch('/{id}',[UsuarioController::class,'update']);
            Route::delete('/{id}',[UsuarioController::class,'destroy']);
        });
    });

    Route::group(['prefix'=> 'tipo_sensor'], function (){
        Route::get('/',[TipoSensorController::class,'index']);
        Route::get('/{id}',[TipoSensorController::class,'show']);
        Route::group(['middleware'=> 'verificarRol:Administrador'], function (){
            Route::post('/',[TipoSensorController::class,'store']);
            Route::patch('/{id}',[TipoSensorController::class,'update']);
            Route::delete('/{id}',[TipoSensorController::class,'destroy']);
        });
    });


    Route::group(['prefix'=> 'area'], function (){
        Route::get('/',[AreaController::class,'index']);
        Route::get('/{id}',[AreaController::class,'show']);
        Route::group(['middleware'=> 'verificarRol:Administrador'], function (){
            Route::post('/',[AreaController::class,'store']);
            Route::patch('/{id}',[AreaController::class,'update']);
            Route::delete('/{id}',[AreaController::class,'destroy']);
        });
    });

    Route::group(['prefix'=> 'departamento'], function (){
        Route::get('/',[DepartamentoController::class,'index']);
        Route::get('/{id}',[DepartamentoController::class,'show']);
        Route::group(['prefix'=> 'verificarRol:Administrador'], function (){
            Route::post('/',[DepartamentoController::class,'store']);
            Route::patch('/{id}',[DepartamentoController::class,'update']);
            Route::delete('/{id}',[DepartamentoController::class,'destroy']);
        });
    });

    Route::group(['prefix'=> 'rol'], function (){
        Route::get('/',[RolController::class,'index']);
        Route::get('/{id}',[RolController::class,'show']);
        Route::group(['prefix'=> 'verificarRol:Administrador'], function (){
            Route::post('/',[RolController::class,'store']);
            Route::patch('/{id}',[RolController::class,'update']);
            Route::delete('/{id}',[RolController::class,'destroy']);
        });
    });

    Route::get('/logout',[AuthenticationController::class,'logout']);

    Route::get('/accesos',[RegistroAccesoController::class,'index']);
    Route::get('/sensores_movimientos',[SensorMovimientoController::class,'index']);

});

Route::get('/websockets',[WebSocketController::class,'getData']);
