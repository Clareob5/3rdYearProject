<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Group;
use App\Models\User;
use App\Models\UserWatchlist;
use Auth;
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Recombee\RecommApi\Requests\RecommendItemsToUser;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:user'); //can add more authorisation to view the page e.g admin
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()

  {
    //sets new client with public token to send request sot API
    $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
    $user_id = Auth::user()->id; //user id is assigned the value od user->id
    $count = 6; //the amount of movies i want displayed

    //assigns result of the client query to oci_get_implicit_resultset
    //this retrieves values from a scenario made within recombee that will give out top recs for the user
    $results = $client->send(
      new Reqs\RecommendItemsToUser($user_id, $count, ['scenario' => 'Top_recommendations'])
    );
    //blow is a request timeont chang that was used to try adn stop an error appear
    // $results->setTimeout(5000);
    // //$request
    // //$client->send($request);

    //store the ids in an array
    $recomms =  $results['recomms'];

    //   for ($i = 0; $i < 6; $i++) {
    //   echo $recomms[$i]['id'];
    // }
    //
    // print_r($recomms[0]['id']);

      $movies = Movie::All();
      $reviews = Review::orderBy('rating', 'DESC')->limit(4)->get();
      // $review->rating = Review::All();
      $pop_movies = Movie::orderBy('rating','DESC')->limit(6)->get();
      $groups = Group::All();


      return view('user.home', [
        'movies' => $movies,
        'reviews' => $reviews,
        'groups' => $groups,
        'pop_movies' => $pop_movies,
        'recomms' => $recomms
      ]);

      $id = Auth::user()->id;
      $movies = User::find($id)->movies;
      echo $movies;
      echo $id;
      return view('user.watchlist', [
        'movies' => $movies
      ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {
       $movie = Movie::findOrFail($id);

       return view('user.movies.show', [
         'movie' => $movie
       ]);
   }


}
