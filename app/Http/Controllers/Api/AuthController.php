<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (!$token = auth('api')->attempt($credentials)) {
        return response()->json([
            'success' => false,
            'message' => 'Username atau password salah'
        ], 401);
    }

    return response()->json([
        'success' => true,
        'message' => 'Login berhasil',
        'access_token' => $token,
        'token_type' => 'Bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 60
    ]);
}


public function register(Request $request)
{
    $request->validate([
        'username' => 'required|unique:users',
        'password' => 'required'
    ]);

    User::create([
        'username' => $request->username,
        'password' => bcrypt($request->password)
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Register berhasil'
    ]);
}




}

