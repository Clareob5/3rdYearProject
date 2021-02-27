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

        $user_rec = new UserRecs();
        $user_rec->genres = ["Horror","Drama"];
        $user_rec->movie_ids = ["1","7","5"];
        $user_rec->user_id = 7;
        $user_rec->save();

        $user_rec = new UserRecs();
        $user_rec->genres = ["Sci-Fi","Fantasy","Adventure"];
        $user_rec->movie_ids = ["3","8"];
        $user_rec->user_id = 5;
        $user_rec->save();

        $user_rec = new UserRecs();
        $user_rec->genres = ["Drama","Romance"];
        $user_rec->movie_ids = ["6","4", "7"];
        $user_rec->user_id = 6;
        $user_rec->save();

        $user_rec = new UserRecs();
        $user_rec->genres = ["Thriller"];
        $user_rec->movie_ids = ["3","7"];
        $user_rec->user_id = 8;
        $user_rec->save();

        $user_rec = new UserRecs();
        $user_rec->genres = ["Horror","Drama"];
        $user_rec->movie_ids = ["1","2"];
        $user_rec->user_id = 9;
        $user_rec->save();

        $user_rec = new UserRecs();
        $user_rec->genres = ["Horror","Comedy", "Action"];
        $user_rec->movie_ids = ["2","5"];
        $user_rec->user_id = 12;
        $user_rec->save();

        $user_rec = new UserRecs();
        $user_rec->genres = ["Horror","Thriller"];
        $user_rec->movie_ids = ["3","8"];
        $user_rec->user_id = 11;
        $user_rec->save();

        $user_rec = new UserRecs();
        $user_rec->genres = ["Comedy","Drama"];
        $user_rec->movie_ids = ["3","4"];
        $user_rec->user_id = 10;
        $user_rec->save();


    }


}
