<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'old_username' => 'required',
            'new_username' => 'required',
            'new_password' => 'nullable|min:4'
        ]);

        $user = User::where('username', $request->old_username)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan'
            ]);
        }

        // Update username
        $user->username = $request->new_username;

        // Update password jika diisi
        if (!empty($request->new_password)) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui',
            'username' => $user->username
        ]);
    }

    public function deleteAccount(Request $request)
{
    $request->validate([
        'username' => 'required'
    ]);

    $user = User::where('username', $request->username)->first();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User tidak ditemukan'
        ], 404);
    }

    $user->delete();

    return response()->json([
        'success' => true,
        'message' => 'Akun berhasil dihapus'
    ]);
}

}
