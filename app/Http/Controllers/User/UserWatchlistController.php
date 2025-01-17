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
      echo $id;
      return view('user.watchlist', [
        'movies' => $movies,
        'id' => $id
      ]);
  }

  //adds movie to watchlist
  public function store(Request $request){

    $id = Auth::user()->id;
    $user = Auth::user();
    $movies = User::find($id)->movies;

    $movie_id=$request->input('movie_id');
    $movie_qty=$request->input('movie_qty');
    $user->movies()->attach($movie_id);
    $watchlist=[];

    //sends request to the recommender to show they like the movie
    $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
    $request = new Reqs\AddDetailView($id, $movie_id, ['cascadeCreate' => true]);

    $request->setTimeout(5000);
    $client->send($request);

    foreach ($movies as $movie) {
      $watchlist[]=$movie;
    }
    // if(in_array($movie_id,$watchlist)){
    //   $response['present']=true;
    //   $response['message']="Movie is already added to watchlist";
    // }else{
    //   $user->movies()->attach($movie_id);
    //   $response['status']=true;
    //   $response['message']="Movie added to watchlist";
    // }

    return json_encode($response);
}

//remove item from watchlist method
public function destroy(Request $request, $id)
{
    $user = User::find(Auth::user()->id);
    $user->movies()->detach($id);

    //$request->session()->flash('danger', 'Movie deleted');

    return redirect()->route('user.watchlist');
}
}
