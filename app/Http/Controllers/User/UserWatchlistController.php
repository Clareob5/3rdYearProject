<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class UserWatchlistController extends Controller
{
  public function index()
  {
      $movies = Movie::All();
      return view('user.watchlist', [
        'movies' => $movies
      ]);
  }
}
