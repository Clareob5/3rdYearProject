<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Group;

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
<<<<<<< HEAD
    $movies = Movie::all();
    return view('user.home', [
      'movies' => $movies
    ]);
=======
      $movies = Movie::All();
      $groups = Group::ALL();
      return view('user.home', [
        'movies' => $movies,
        'groups' => $groups
      ]);
>>>>>>> c7dab86fe06d7ce342562ce5f02ebe7bd9360ec4
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
