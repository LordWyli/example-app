<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = Usuario::where('id_usuario', $request->id_usuario)->first();

        if(!$user || !Hash::check($request->clave_acceso,$user->clave_acceso))
        {
            return response()->json([
                'error' => 'Credenciales incorrectas'
            ],401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Bienvenido '.$user->nombre,
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    public function logout()
    {

        return response()->json([
            'message' => 'Cerro session correctamente'
        ],200);
    }
}
