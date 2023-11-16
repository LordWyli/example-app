<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
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
        if(Auth::check())
        {
            Auth::user()->tokens()->where('id', Auth::user()->currentAccessToken()->id)->delete();

            return response()->json([
                'message' => 'Cerro session correctamente'
            ],200);
        } else {
            return response()->json([
                'message' => 'No hay session activa para cerrar'
            ],401);
        }
    }
}
