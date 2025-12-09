<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LeaderboardController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/login', function () {
    return response()->json(['message' => 'Login API ready. Use POST to login.']);
});
Route::get('/leaderboard', [LeaderboardController::class, 'top']);
Route::post('/add-win', [LeaderboardController::class, 'addWin']);

