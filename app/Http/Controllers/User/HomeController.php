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
    //sends the request to the API
    $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
    $user_id = Auth::user()->id;
    $count = 6;

    // $results = NULL;


    $results = $client->send(
      new Reqs\RecommendItemsToUser($user_id, $count, ['scenario' => 'Top_recommendations'])
    );
    // $results->setTimeout(5000);
    // //$request
    // //$client->send($request);

    $recomms =  $results['recomms'];
    //
    //   for ($i = 0; $i < 6; $i++) {
    //   echo $recomms[$i]['id'];
    // }
    //
    // print_r($recomms[0]['id']);

      $movies = Movie::All();
      // $review->review = Review::All();
      // $review->rating = Review::All();
      $pop_movies = Movie::orderBy('rating','DESC')->limit(6)->get();
      $groups = Group::All();
      return view('user.home', [
        'movies' => $movies,
        // 'review' => $review,
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

// $client -> send(new Reqs\SetItemValues("10",
//     // values
//     [
//       "title" => "Automata",
//       "cast" => "Antonio Banderas, Dylan McDermott, Melanie Griffith, Birgitte Hjort SÃ¸rensen, Robert Forster, Christa Campbell, Tim McInnerny, Andy Nyman, David Ryall",
//       "country" => "Bulgaria",
//       //"cover" => image.png,
//       "date_added" => "20",
//       "description" => "Hitler Youth cadet Jojo Betzler firmly believes in the ideals of Nazism manifested by his imaginary friend, Adolf Hitler. ",
//       "director" => "Pete Docter",
//       "duration" => '107mins',
//       "genre" => ["Comedy"],
//       "rating" => "8.1",
//       "release_year" => 2020
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("11",
//     [
//       "title"=>"Good People",
//       "director"=>"Henrik Ruben Genz",
//       "cast"=>"James Franco, Kate Hudson, Tom Wilkinson, Omar Sy, Sam Spruell, Anna Friel, Thomas Arnold, Oliver Dimsdale, Diana Hardcastle",
//       "country"=>"United States",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2014",
//       "rating"=>"9.00",
//       "duration"=>"190 min",
//       "genre"=>["Action & Adventure"],
//       "description"=>"A struggling couple can't believe their luck when they find a stash of money in the apartment of a neighbor who was recently murdered. ",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("12",
//     [
//       "title"=>"Kidnapping Mr. Heineken",
//       "director"=>"Daniel Alfredson",
//       "cast"=>"Antonio Banderas, Dylan McDermott, Melanie Griffith, Birgitte Hjort SÃ¸rensen, Robert Forster, Christa Campbell, Tim McInnerny, Andy Nyman, David Ryall",
//       "country"=>"Netherlands",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2015",
//       "rating"=>"9.50",
//       "duration"=>"190 min",
//       "genre"=>["Action & Adventure"],
//       "description"=>"When beer magnate Alfred Freddy Heineken is kidnapped in 1983, his abductors make the largest ransom demand in history.",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("13",
//     [
//       "title"=>"Krish Trish and Baltiboy",
//       "director"=>"Gabe IbÃez",
//       "cast"=>"Damandeep Singh Baggan, Smita Malhotra, Baba Sehgal",
//       "country"=>"Bulgaria",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2009",
//       "rating"=>"6.30",
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
//     $client -> send(new Reqs\SetItemValues("14",
//     [
//       "title"=>"Next Gen",
//       "director"=>"Kevin R. Adams",
//       "cast"=>"John Krasinski, Charlyne Yi, Jason Sudeikis, Michael PeÃ±a, David Cross, Constance Wu",
//       "country"=>"China",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2018",
//       "rating"=>"6.80",
//       "duration"=>"106 min",
//       "genre"=>["Sci-Fi & Fantasy"],
//       "description"=>"When lonely Mai forms an unlikely bond with a top-secret robot, they embark on an intense, action-packed adventure to foil the plot of a vicious villain.",
//
//     ],
//
//     //optional parameters
//     [
//       "cascadeCreate" => true
//     ]
// ));
//
// $client -> send(new Reqs\SetItemValues("19",
//     // values
//     [
//       "title" => "Sierra Burgess Is A Loser",
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
//
//     $client -> send(new Reqs\SetItemValues("8",
//     [
//       "title"=>"Jandino: Whatever it Takes",
//       "director"=>"Jandino Asporaat",
//       "cast"=>"Jandino Asporaat",
//       "country"=>"United States",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2016",
//       "rating"=>"8.30",
//       "duration"=>"94 min",
//       "genre"=>["Stand-Up Comedy"],
//       "description"=>"Jandino Asporaat riffs on the challenges of raising kids and serenades the audience with a rousing rendition of Sex on Fire in his comedy show.",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//
//     $client -> send(new Reqs\SetItemValues("27",
//     [
//       "title"=>"She Dies Tomorrow",
//       "director"=>"Amy Seimetz",
//       "cast"=>"Kate Lyn Sheil, Jane Adams, Kentucker Audley",
//       "country"=>"United States",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2020",
//       "rating"=>"5.20",
//       "duration"=>"190 min",
//       "genre"=>["Comedy"],
//       "description"=>"Amy thinks she's dying tomorrow...and it's contagious.",
//
//     ],
//
//     //optional parameters
//     [
//       "cascadeCreate" => true
//     ]
// ));
//
// $client -> send(new Reqs\SetItemValues("28",
//     // values
//     [
//       "title" => "Star Wars: The Last Jedi",
//       "cast" => "Rian Johnson",
//       "country" => "Daisy Ridley, John Boyega, Mark Hamill",
//       //"cover" => image.png,
//       "date_added" => "20",
//       "description" => "Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.",
//       "director" => "Pete Docter",
//       "duration" => '94 min',
//       "genre" => ["Action"],
//       "rating" => "7.00",
//       "release_year" => 7.00
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("29",
//     [
//       "title"=>"The Dark Knight Rises",
//       "director"=>"Christopher Nolan",
//       "cast"=>"Christian Bale, Tom Hardy, Anne Hathaway",
//       "country"=>"Bulgaria",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2012",
//       "rating"=>"8.40",
//       "duration"=>"99 min",
//       "genre"=>["Action"],
//       "description"=>"Eight years after the Joker's reign of anarchy, Batman, with the help of the enigmatic Catwoman, is forced from his exile to save Gotham City from the brutal guerrilla terrorist Bane.",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("30",
//     [
//       "title"=>"Whiplash",
//       "director"=>"Damien Chazelle",
//       "cast"=>"Miles Teller, J.K. Simmons, Melissa Benoist",
//       "country"=>"Bulgaria",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2020",
//       "rating"=>"8.50",
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
//     $client -> send(new Reqs\SetItemValues("31",
//     [
//       "title"=>"Wolf Walkers",
//       "director"=>"Tomm Moore",
//       "cast"=>"Honor Kneafsey, Eva Whittaker, Sean Bean",
//       "country"=>"United States",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2020",
//       "rating"=>"8.10",
//       "duration"=>"134 min",
//       "genre"=>["Action & Adventure"],
//       "description"=>"A young apprentice hunter and her father journey to Ireland to help wipe out the last wolf pack. But everything changes when she befriends a free-spirited girl from a mysterious tribe rumored to transform into wolves by night.",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("32",
//     [
//       "title"=>"Annabelle Comes Home",
//       "director"=>"Gary Dauberman",
//       "cast"=>"Vera Farmiga, Patrick Wilson, Mckenna Grace",
//       "country"=>"Netherlands",
//       "date_added"=>"2019-02-27",
//       "release_year"=>"2015",
//       "rating"=>"9.50",
//       "duration"=>"190 min",
//       "genre"=>["Action & Adventure"],
//       "description"=>"While babysitting the daughter of Ed and Lorraine Warren, a teenager and her friend unknowingly awaken an evil spirit trapped in a doll.",
//
//     ],
//
//     //optional parameters
//     [
//       "cascadeCreate" => true
//     ]
// ));
//
// $client -> send(new Reqs\SetItemValues("33",
//     // values
//     [
//       "title" => "Corpus Christi",
//       "cast" => "Tina Fey, Jamie Foxx",
//       "country" => "Ukraine",
//       //"cover" => image.png,
//       "date_added" => "20",
//       "description" => "A team of minstrels, including a monkey, cat and donkey, narrate folktales from the Indian regions of Rajasthan, Kerala and Punjab.",
//       "director" => "Pete Docter",
//       "duration" => '107mins',
//       "genre" => ["Drama"],
//       "rating" => "6.30",
//       "release_year" => 2009
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("34",
//     [
//       "title"=>"Euphoria",
//       "director"=>"Kevin R. Adams",
//       "cast"=>"Zendaya, Charlyne Yi, Jason Sudeikis, Michael PeÃ±a, David Cross, Constance Wu",
//       "country"=>"China",
//       "date_added"=>"2021-02-08",
//       "release_year"=>"2019",
//       "rating"=>"6.8",
//       "duration"=>"106 min",
//       "genre"=>["Comedy"],
//       "description"=>"When lonely Mai forms an unlikely bond with a top-secret robot, they embark on an intense, action-packed adventure to foil the plot of a vicious villain.",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("35",
//     [
//       "title"=>"Equalizer",
//       "director"=>"Ian Samuels",
//       "cast"=>"Shannon Purser, Kristine Froseth, RJ Cyler, Noah Centineo, Loretta Devine, Giorgia Whigham, Alice Lee, Lea Thompson, Alan Ruck, Mary Pat Gleason, Chrissy Metz",
//       "country"=>"United States",
//       "date_added"=>"2020-01-27",
//       "release_year"=>"2019",
//       "rating"=>"7.90",
//       "duration"=>"190 min",
//       "genre"=>["Comedy"],
//       "description"=>"A wrong-number text sparks a virtual romance between a smart but unpopular teen and a sweet jock who thinks he's talking to a gorgeous cheerleader.",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("36",
//     [
//       "title"=>"The Godfather",
//       "director"=>"Steven Spielberg",
//       "cast"=>"Jennifer Lawrence, Matt Damon, Adam Sandler",
//       "country"=>"United States",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"1972",
//       "rating"=>"9.20",
//       "duration"=>"190 min",
//       "genre"=>["Drama"],
//       "description"=>"A man in an unsatisfying marriage recalls the details of an intense past relationship with an ex-girlfriend when he gets word that she may be missing.",
//
//     ],
//
//     [
//       "cascadeCreate" => true
//     ]
// ));
//     $client -> send(new Reqs\SetItemValues("37",
//     [
//       "title"=>"Gone Girl",
//       "director"=>"Tom O'Brien",
//       "cast"=>"Tom O'Brien, Katherine Waterston, Caitlin Fitzgerald, Gaby Hoffmann, Louis Cancelmi, Zach Grenier",
//       "country"=>"United States",
//       "date_added"=>"2021-02-27",
//       "release_year"=>"2014",
//       "rating"=>"9.00",
//       "duration"=>"190 min",
//       "genre"=>["Comedy"],
//       "description"=>"A filmmaker working on a documentary about love in modern Manhattan becomes personally entangled in the romantic lives of his subjects.",
//
//     ],
//
//     //optional parameters
//     [
//       "cascadeCreate" => true
//     ]
// ));
//
// $client -> send(new Reqs\SetItemValues("38",
// [
//   "title"=>"Cheaper By the Dozen",
//   "director"=>"Shawn Levy",
//   "cast"=>"Ron Perlman, Rupert Grint, Robert Sheehan, Stephen Campbell Moore, Eric Lampaert, Kevin Bishop, Tom Audenaert, Erika Sainte",
//   "country"=>"France",
//   "date_added"=>"2021-02-27",
//   "release_year"=>"2005",
//   "rating"=>"5.90",
//   "duration"=>"96 min",
//   "genre"=>["Comedy"],
//   "description"=>"With his wife doing a book tour, a father of twelve must handle a new job and his unstable brood.",
//
// ],
//
// [
//   "cascadeCreate" => true
// ]
// ));
// $client -> send(new Reqs\SetItemValues("39",
// [
//   "title"=>"Apocalypse",
//   "director"=>"Francis Ford Coppola",
//   "cast"=>"Martin Sheen, Marlon Brando, Robert Duvall",
//   "country"=>"United States",
//   "date_added"=>"2019-02-27",
//   "release_year"=>"1979",
//   "rating"=>"8.4",
//   "duration"=>"90 min",
//   "genre"=>["Drama"],
//   "description"=>"A New Orleans politician finds his idealistic plans for rebuilding after a toxic oil spill unraveling thanks to a sex scandal.",
//
// ],
//
// //optional parameters
// [
//   "cascadeCreate" => true
// ]
// ));
