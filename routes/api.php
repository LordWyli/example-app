<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\Authentication\AuthenticationController;

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

Route::middleware('auth:sanctum')->group(function (){
    Route::controller(UsuarioController::class)->group(function (){
        Route::get('/usuarios','index');
        Route::post('/usuario/crear','store');
        Route::get('/usuario/{id}','show');
        Route::patch('/usuario/update/{id}','update');
        Route::delete('/usuario/delete/{id}','destroy');
    });

    Route::get('/logout',[AuthenticationController::class,'logout']);
});
