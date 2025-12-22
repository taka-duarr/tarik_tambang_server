<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PlayerScore;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    public function top()
    {
        $data = PlayerScore::orderBy('wins', 'desc') // ⇽ ranking dari paling banyak menang
                           ->limit(100)
                           ->get();

        return response()->json([
            'success' => true,
            'leaderboard' => $data
        ]);
    }

public function addWin()
{
    $user = Auth::user();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ], 401);
    }

    $score = PlayerScore::firstOrCreate(
        ['user_id' => $user->id],
        [
            'username' => $user->username,
            'wins' => 0
        ]
    );

    $score->wins += 1;
    $score->save();

    return response()->json([
        'success' => true,
        'message' => 'Win berhasil ditambahkan',
        'wins' => $score->wins
    ]);
}




}
