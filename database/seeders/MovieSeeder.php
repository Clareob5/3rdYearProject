<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $movie = new Movie();
      $movie->title = "Lost";
      $movie->director = "Steven Spielberg";
      $movie->cast = "Jennifer Lawrence, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "September 9, 2019";
      $movie->release_year = 2019;
      $movie->rating = "TV-PG";
      $movie->duration = "190 min";
      $movie->listed_in = "Action";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "image.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Found";
      $movie->director = "Steven Spielberg";
      $movie->cast = "Jennifer Lawrence, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "September 9, 2019";
      $movie->release_year = 2019;
      $movie->rating = "TV-PG";
      $movie->duration = "190 min";
      $movie->listed_in = "Drama";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "image2.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Destination";
      $movie->director = "Steven Spielberg";
      $movie->cast = "Jennifer Lawrence, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "September 9, 2019";
      $movie->release_year = 2019;
      $movie->rating = "TV-PG";
      $movie->duration = "190 min";
      $movie->listed_in = "Horror";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "image3.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Roadtrip";
      $movie->director = "Steven Spielberg";
      $movie->cast = "Jennifer Lawrence, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "September 9, 2019";
      $movie->release_year = 2019;
      $movie->rating = "TV-PG";
      $movie->duration = "190 min";
      $movie->listed_in = "Comedy";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "image4.jpg";
      $movie->save();
    }
}
