<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reviews;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $review = new Reviews();
      $review->review = "Good movie";
      $review->rating = 4.5;
      $review->user_id = 2;
      $review->movie_id = 1;
      $review->save();

      $review = new Reviews();
      $review->review = "Great movie";
      $review->rating = 5.0;
      $review->user_id = 2;
      $review->movie_id = 1;
      $review->save();

      $review = new Reviews();
      $review->review = "Ok movie";
      $review->rating = 3.5;
      $review->user_id = 2;
      $review->movie_id = 1;
      $review->save();
    }
}
