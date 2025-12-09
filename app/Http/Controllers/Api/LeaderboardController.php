<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PlayerScore;


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

    public function addWin(Request $request)
{
    $request->validate([
        'username' => 'required'
    ]);

    // cek user ada atau tidak
    $player = PlayerScore::where('username', $request->username)->first();

    if (!$player) {
        // jika belum ada, buat baru
        $player = PlayerScore::create([
            'username' => $request->username,
            'wins' => 1
        ]);
    } else {
        // tambahkan kemenangan
        $player->wins += 1;
        $player->save();
    }

    return response()->json([
        'success' => true,
        'message' => 'Win updated',
        'wins' => $player->wins
    ]);
}

}
