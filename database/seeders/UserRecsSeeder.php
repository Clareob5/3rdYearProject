<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRecs;

class UserRecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_rec = new UserRecs();
        $user_rec->genres = ["Horror","Drama"];
        $user_rec->movie_ids = ["3","4"];
        $user_rec->user_id = 3;
        $user_rec->save();
    }
}
