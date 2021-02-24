<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Recombee\RecommApi\Exceptions as Ex;

class UserWatchlistController extends Controller
{
  public function index()
  {


    $client = new Client('alphafilms-dev', 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');

    $requests = array();
    $str = file_get_contents('user_watchlists.json');

    foreach(json_decode($str, true) as $interacion) {
        $user_id = $interacion['user_id'];
        $item_id = $interacion['movie_id'];
        $time = $interacion['created_at'];

        $r = new Reqs\AddDetailsView($user_id, $item_id,
                                        ['timestamp' => $time, 'cascadeCreate' => true]);

       array_push($requests, $r);
    }

    $br = new Reqs\Batch($requests);
    $client->send($br);


      $movies = Movie::All();
      return view('user.watchlist', [
        'movies' => $movies
      ]);
  }
}
