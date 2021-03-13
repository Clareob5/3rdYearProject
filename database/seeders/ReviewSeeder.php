<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $review = new Review();
      $review->review = "Good movie";
      $review->rating = 4.5;
      $review->user_id = 2;
      $review->movie_id = 20;
      $review->save();

      $review = new Review();
      $review->review = "Great movie";
      $review->rating = 5.0;
      $review->user_id = 2;
      $review->movie_id = 16;
      $review->save();

      $review = new Review();
      $review->review = "Ok movie";
      $review->rating = 3.5;
      $review->user_id = 6;
      $review->movie_id = 15;
      $review->save();


    }
}
