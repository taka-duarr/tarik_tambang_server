<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Username tidak ditemukan'
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Password salah'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
        ]);
    }

    public function register(Request $request)
{
    $request->validate([
        'username' => 'required|unique:users,username|min:3',
        'password' => 'required|min:4'
    ]);

    $user = User::create([
        'username' => $request->username,
        'password' => Hash::make($request->password)
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Registrasi berhasil',
        'user' => [
            'id' => $user->id,
            'username' => $user->username
        ]
    ]);
}



}

