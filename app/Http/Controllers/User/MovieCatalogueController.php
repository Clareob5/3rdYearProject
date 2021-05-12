<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;
use Auth;
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Recombee\RecommApi\Exceptions as Ex;

class MovieCatalogueController extends Controller
{
  public function index()
  {



    $movies = Movie::all();

    return view('user.catalogue', [
      'movies' => $movies
    ]);
  }

  public function store(Request $request){

    //
}

public function show(){
  $movie = Movie::findOrFail($id);

 // $time = $movie->created_at;
  $user_id = Auth::user()->id;

  $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
  $client -> send(new Reqs\AddDetailView($user_id, "$id", ['cascadeCreate' => true]));



    return view('user.movies.show', [
      'movie' => $movie
    ]);
}
}
