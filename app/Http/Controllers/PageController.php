<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Auth;

class PageController extends Controller
{
    public function welcome()
    {

      $pop_movies = Movie::orderBy('rating','DESC')->limit(6)->get();

      $recent_rev = DB::table('reviews')
                   ->select('movie_id')->orderBy('created_at','DESC')->limit(12);

      $recent_reviews = DB::table('movies')
        ->joinSub($recent_rev, 'recent_reviews', function ($join) {
            $join->on('movies.id', '=', 'recent_reviews.movie_id');
        })->get();

        $recent_movies = Movie::orderBy('date_added','DESC')->limit(4)->get();
      echo $recent_reviews;

      return view('welcome', [
        'movies' => $pop_movies,
        'recent_reviews' => $recent_reviews,
        'recent_movies' => $recent_movies
      ]);
      //redirects to welcome page by redirecting to welcome view

    }

    public function about()
    {
      return view('about'); //redirects to about page by redirecting to about view

    }
}
