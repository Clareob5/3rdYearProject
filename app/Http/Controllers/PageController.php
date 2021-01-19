<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Auth;

class PageController extends Controller
{
    public function welcome()
    {
      $movies = Movie::all();
      return view('welcome', [
        'movies' => $movies,
      ]);
      //redirects to welcome page by redirecting to welcome view

    }

    public function about()
    {
      return view('about'); //redirects to about page by redirecting to about view

    }
}
