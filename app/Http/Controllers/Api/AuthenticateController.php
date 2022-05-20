<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ChangePasswordUnauthorizeException;
use App\Http\Controllers\Controller;
use App\Http\Requests\IfExistEmailRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Notifications\SendPasswordResetEmail as NotificationsSendPasswordResetEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthenticateController extends Controller
{
    public function login(Request $request): JsonResponse
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->services(false, 'Acceso Inautorizado', [], 401);
        }

        $data = [
            'session_token' => $request->user()->createToken($request->device)->plainTextToken
        ];

        return response()->services(true, 'El usuario inicio sesion', $data);
    }
    
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->services(true, 'La sesión fue cerrada');

    }

    public function getUser(Request $request)
    {
        $user = User::find($request->user()->id);
        return response()->services(true, 'Informacion del usuario', $user);
    }
}