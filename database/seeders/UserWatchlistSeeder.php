<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserWatchlist;

class UserWatchlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 1; $i <= 20; $i++) {
        $user = UserWatchlist::factory()->create();

      }
    }
}
