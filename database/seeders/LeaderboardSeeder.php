<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaderboardSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('leaderboard')->insert([
            ['username' => 'Firman', 'wins' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Andi', 'wins' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Budi', 'wins' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Cahyo', 'wins' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Dewi', 'wins' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Eka', 'wins' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Fajar', 'wins' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Gilang', 'wins' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Hana', 'wins' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Indra', 'wins' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Joko', 'wins' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Kiki', 'wins' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Lutfi', 'wins' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Mira', 'wins' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'Nanda', 'wins' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
