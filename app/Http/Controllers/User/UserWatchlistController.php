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

class UserWatchlistController extends Controller
{
  public function index()
  {



      $id = Auth::user()->id;
      $movies = User::find($id)->movies;
      echo $movies;
      echo $id;
      return view('user.watchlist', [
        'movies' => $movies
      ]);
  }

  public function store(Request $request){

    $id = Auth::user()->id;
    $user = Auth::user();

    $movie_id=$request->input('movie_id');

    $movie_qty=$request->input('movie_qty');
    $user->movies()->attach($movie_id);


    return response()->json(['code'=>200, 'success'=>true, 'message'=>' successfully', 200]);
}
}
