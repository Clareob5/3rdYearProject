<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Recombee\RecommApi\Requests\AddPurchase;
use App\Models\UserRecs;
use App\Models\Movie;
use Auth;

class UserRecsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:user'); //can add more authorisation to view the page e.g admin
  }

    public function index()
    {

    }

    public function createGenre(Request $request)
    {

      $userRec = $request->session()->get('user_recs');
      return view('user.recs.create_genres',compact('userRec'));

    }

    public function storeGenre(Request $request)
    {

      $id = Auth::user()->id;
      $validatedData = $request->validate([
        'user_id' => 'integer',
        'genres' => 'nullable',
      ]);

      if(empty($request->session()->get('user_recs'))){
        $userRec = new UserRecs();
        $userRec->user_id = $id;
        $userRec['genres'] = $request->input('genres');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();
      }else{
        $userRec = $request->session()->get('user_recs');
        $userRec = new UserRecs();
        $userRec->user_id = $id;
        $userRec['genres'] = $request->input('genres');
        //$userRec->fill($validatedData);
        $request->session()->put('user_recs', $userRec);
        $userRec->save();
      }

     return redirect()->route('user.recs.create_movies', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createMovie(Request $request, $id)
    {
      $userRec = $request->session()->get('user_recs');
      $movies = Movie::All();
      return view('user.recs.create_movies',compact('userRec'), [
        'movies' => $movies
      ]);
    }

    public function storeMovie(Request $request)
    {
      $id = Auth::user()->id;

      $validatedData = $request->validate([
        'movie_ids' => 'nullable',
      ]);
      // $movies = $request->input('movie_ids');;
      // $movies
      var_dump('movie_ids'[1]);
      if(empty($request->session()->get('user_recs'))){
        $userRec = UserRecs::findOrFail($id);
        $userRec['movie_ids'] = $request->input('movie_ids');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();

        $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
        for ($i=0; $i <= count($userRec['movie_ids']); $i++) {
          $request = new Reqs\AddPurchase($id, 'movie_ids'[$i], ['cascadeCreate' => true]);
         }
        $request->setTimeout(5000);
        $client->send($request);
      }else{
        $userRec = $request->session()->get('user_recs');
        $userRec['movie_ids'] = $request->input('movie_ids');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();

        $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
        for ($i=0; $i <= count($userRec['movie_ids']); $i++) {
          $request = new Reqs\AddPurchase($id, 'movie_ids'[$i], ['cascadeCreate' => true]);
        }
        $request->setTimeout(5000);
        $client->send($request);
      }

     return redirect()->route('user.profile');
    }

    public function editGenre(Request $request, $id)
    {
        $user = UserRecs::findOrFail($id)->where('user_id' == $id);
        $userRec = $request->session()->get('user_recs');
        return view('user.recs.genres',[
          'user' => $user,
          'userRec' => $userRec
        ]);
    }


    public function updateGenre(Request $request, $id)
    {
      $validatedData = $request->validate([
        'genres' => 'nullable',
      ]);

      if(empty($request->session()->get('user_recs'))){
        $userRec = UserRecs::findOrFail($id);
        $userRec->user_id = $id;
        $userRec['genres'] = $request->input('genres');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();
      }else{
        $userRec = UserRecs::findOrFail($id);
        $userRec = $request->session()->get('user_recs');
        $userRec->user_id = $id;
        $userRec['genres'] = $request->input('genres');
        //$userRec->fill($validatedData);
        $request->session()->put('user_recs', $userRec);
        $userRec->save();
      }

     return redirect()->route('user.recs.movies', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMovie(Request $request, $id)
    {

      $userRec = $request->session()->get('user_recs');
      $user = UserRecs::findOrFail($id)->where('user_id' == $id);
      $movies = Movie::All();
      return view('user.recs.movies',compact('userRec'), [
        'movies' => $movies,
        'user' => $user
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMovie(Request $request, $id)
    {
      $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
      $validatedData = $request->validate([
        'movie_ids' => 'nullable',
      ]);

      if(empty($request->session()->get('user_recs'))){
        $userRec = UserRecs::findOrFail($id)->where('user_id' == $id);
        $userRec['movie_ids'] = $request->input('movie_ids');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();

        for ($i=0; $i <= count($userRec['movie_ids']); $i++) {
          $request = new Reqs\AddPurchase($id, 'movie_ids'[$i], ['cascadeCreate' => true]);
         }
        $request->setTimeout(5000);
        $client->send($request);
      }else{
        $userRec = UserRecs::findOrFail($id)->where('user_id' == $id);
        $userRec = $request->session()->get('user_recs');
        $userRec['movie_ids'] = $request->input('movie_ids');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();

        for ($i=0; $i <= count($userRec['movie_ids']); $i++) {
          $request = new Reqs\AddPurchase($id, 5, ['cascadeCreate' => true]);
         }
        $request->setTimeout(5000);
        $client->send($request);

      }

     return redirect()->route('user.profile');
    }



    public function destroy($id)
    {
        //
    }
}
