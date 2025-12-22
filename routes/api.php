<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LeaderboardController;
use App\Http\Controllers\Api\ProfileController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/leaderboard', [LeaderboardController::class, 'top']);

Route::middleware('jwt.auth')->group(function () {
    Route::post('/update-profile', [ProfileController::class, 'update']);
    Route::post('/delete-account', [ProfileController::class, 'deleteAccount']);
    Route::post('/add-win', [LeaderboardController::class, 'addWin']);
});