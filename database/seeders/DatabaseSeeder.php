<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ///call seeders we created here
         $this->call(RoleSeeder::class);
         $this->call(MovieSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(ReviewSeeder::class);
         $this->call(UserRecsSeeder::class);
       //  $this->call(UserWatchlistSeeder::class);
    }
}
