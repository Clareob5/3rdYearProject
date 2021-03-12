<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeMovie(Request $request)
    {
      $id = Auth::user()->id;

      $validatedData = $request->validate([
        'movie_ids' => 'nullable',
      ]);

      if(empty($request->session()->get('user_recs'))){
        $userRec = UserRecs::findOrFail($id);
        $userRec['movie_ids'] = $request->input('movie_ids');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();
      }else{
        $userRec = $request->session()->get('user_recs');
        $userRec['movie_ids'] = $request->input('movie_ids');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();
      }

     return redirect()->route('profile.index');
    }

    public function editGenre(Request $request, $id)
    {
        $userRec = $request->session()->get('user_recs');
        return view('user.recs.genres',compact('userRec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateGenre(Request $request, $id)
    {
      $validatedData = $request->validate([
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
      $movies = Movie::All();
      return view('user.recs.movies',compact('userRec'), [
        'movies' => $movies
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
      $validatedData = $request->validate([
        'movie_ids' => 'nullable',
      ]);

      if(empty($request->session()->get('user_recs'))){
        $userRec = UserRecs::findOrFail($id);
        $userRec['movie_ids'] = $request->input('movie_ids');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();
      }else{
        $userRec = $request->session()->get('user_recs');
        $userRec['movie_ids'] = $request->input('movie_ids');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();
      }

     return redirect()->route('profile.index');
    }



    public function destroy($id)
    {
        //
    }
}
