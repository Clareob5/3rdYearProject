<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRecs;
use App\Models\Movie;

class UserRecsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:user'); //can add more authorisation to view the page e.g admin
  }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGenre(Request $request)
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
    public function storeGenre(Request $request)
    {
      $validatedData = $request->validate([
        'genres' => 'nullable',
      ]);

      if(empty($request->session()->get('user_recs'))){
        $userRec = new UserRecs();
        $userRec->user_id = 3;
        $userRec['genres'] = $request->input('genres');
        $request->session()->put('user_recs', $userRec);
        $userRec->save();
      }else{
        $userRec = $request->session()->get('user_recs');
        $userRec->fill($validatedData);
        $request->session()->put('user_recs', $userRec);
        $userRec->save();
      }

     return redirect()->route('user.recs.movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createMovie(Request $request)
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
    public function storeMovie(Request $request, $id)
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

     return redirect()->route('profile_show.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
