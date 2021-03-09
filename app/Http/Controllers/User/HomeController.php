<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Group;
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
    $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
    $user_id = Auth::user()->id;
    $count = 6;


    $results = $client->send(
      new RecommendItemsToUser($user_id, $count, ['scenario' => 'Top_recommendations'])
    );

    $recomms =  $results['recomms'];
    // 
    //   for ($i = 0; $i < 6; $i++) {
    //   echo $recomms[$i]['id'];
    // }
    //
    // print_r($recomms[0]['id']);

      $movies = Movie::All();
      $groups = Group::ALL();
      return view('user.home', [
        'movies' => $movies,
        'groups' => $groups,
        'recomms' => $recomms
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

// $client -> send(new Reqs\SetItemValues("3",
//     // values
//     [
//       "title" => "Soul",
//       "cast" => "Tina Fey, Jamie Foxx",
//       "country" => "Ukraine",
//       //"cover" => image.png,
//       "date_added" => "20",
//       "description" => "HD resolution LED TV",
//       "director" => "Pete Docter",
//       "duration" => '107mins',
//       "genre" => ["Family,Comedy"],
//       "rating" => "8.1",
//       "release_year" => 2020
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("4",
//     [
//       "title"=>"Found",
//       "director"=>"Steven Spielberg",
//       "cast"=>"Jennifer Lawrence, Matt Damon, Adam Sandler",
//       "country"=>"United States",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2019",
//       "rating"=>"7.45",
//       "duration"=>"190 min",
//       "genre"=>["Drama"],
//       "description"=>"Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("5",
//     [
//       "title"=>"Destination",
//       "director"=>"Steven Spielberg",
//       "cast"=>"Jennifer Lawrence, Matt Damon, Adam Sandler",
//       "country"=>"United States",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2019",
//       "rating"=>"6.40",
//       "duration"=>"190 min",
//       "genre"=>["Horror"],"description"=>"Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("6",
//     [
//       "title"=>"Roadtrip",
//       "director"=>"Steven Spielberg",
//       "cast"=>"Jennifer Lawrence, Matt Damon, Adam Sandler",
//       "country"=>"United States",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2019",
//       "rating"=>"8.90",
//       "duration"=>"190 min",
//       "genre"=>["Comedy"],
//       "description"=>"Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("7",
//     [
//       "title"=>"1917",
//       "director"=>"Sam Mendes",
//       "cast"=>"Richard Madden, Matt Damon, Adam Sandler",
//       "country"=>"United States",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2019",
//       "rating"=>"7.50",
//       "duration"=>"190 min",
//       "genre"=>["Action"],
//       "description"=>"During World War I, two British soldiers -- Lance Cpl. Schofield and Lance Cpl. Blake -- receive seemingly impossible orders.",
//
//     ],
//
//     //optional parameters
//     [
//       "cascadeCreate" => true
//     ]
// ));
