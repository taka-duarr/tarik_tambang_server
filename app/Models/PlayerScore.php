<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerScore extends Model
{
    protected $table = 'leaderboard';

    protected $fillable = [
        'user_id',
        'username',
        'wins'
    ];
}
