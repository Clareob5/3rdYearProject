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

    //
    // $client = new Client('alphafilms-dev', 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
    //
    // $requests = array();
    // $str = file_get_contents('user_watchlists.json');
    //
    // foreach(json_decode($str, true) as $interacion) {
    //     $user_id = $interacion['user_id'];
    //     $item_id = $interacion['movie_id'];
    //     $time = $interacion['created_at'];
    //
    //     $r = new Reqs\AddDetailView($user_id, $item_id,
    //                                     ['timestamp' => $time, 'cascadeCreate' => true]);
    //
    //    array_push($requests, $r);
    // }
    //
    // $br = new Reqs\Batch($requests);
    // $client->send($br);

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
    echo 'Hi' . $movie_id;
    $movie_qty=$request->input('movie_qty');
    $user->movies()->attach($movie_id);



    // $rules = [
    //   'movie_id' => 'required'
    //   ];
    //
    //   //making a validator that will follow the rules above
    //   $validator = Validator::make($request->all(), $rules);
    //
    //   //if validator fails, return an error
    //   if ($validator->fails()) {
    //     return response()->json($validator->errors(), 422); //422 unprocessable entity
    //   }
    //      $user = User::findOrFail($id);
    //      $user->movies()->attach($request->input('movie_id'));
    //
    //      //return redirect()->route('user.watchlist');
    //
    return response()->json(['code'=>200, 'success'=>true, 'message'=>' successfully', 200]);
}
}
