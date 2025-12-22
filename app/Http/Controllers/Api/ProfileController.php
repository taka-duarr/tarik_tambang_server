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
    $user = auth()->user();

    if ($request->new_username) {
        $user->username = $request->new_username;
    }

    if ($request->new_password) {
        $user->password = bcrypt($request->new_password);
    }

    $user->save();

    return response()->json([
        'success' => true,
        'username' => $user->username
    ]);
}


public function deleteAccount()
{
    auth()->user()->delete();

    return response()->json([
        'success' => true,
        'message' => 'Akun dihapus'
    ]);
}


}
