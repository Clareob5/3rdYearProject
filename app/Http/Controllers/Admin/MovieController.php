<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{


  /**
 * Create a new controller instance.
 *
 * @return void
 */
public function __construct()
{
    $this->middleware('auth');
    $this->middleware('role:admin'); // only allows check of one role
    //after modifying AuthRole you can now add a whole list
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $movies = Movie::all();

       return view('admin.movies.index', [
         'movies' => $movies
       ]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('admin.movies.create');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         $request ->validate([
           'title' => 'required|max:191',
           'description' => 'required|max:255',
           'genre' => 'required|max:191',
           'director' => 'required|max:50',
           'actor' => 'required|max:50',
           'release_date' => 'required|date'
         ]);

         $movie = new Movie();

         $movie->title = $request->input('title');
         $movie->description = $request->input('description');
         $movie->genre = $request->input('genre');
         $movie->director = $request->input('director');
         $movie->actor = $request->input('actor');
         $movie->release_date = $request->input('release_date');
         $movie->save();

         return redirect()->route('admin.movies.index');
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

         return view('admin.movies.show', [
           'movie' => $movie
         ]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
       $movie = Movie::findOrFail($id);

       return view('admin.movies.edit', [
         'movie' => $movie
       ]);
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

       $request ->validate([
         'title' => 'required|max:191',
         'description' => 'required|max:255',
         'genre' => 'required|max:191',
         'director' => 'required|max:50',
         'actor' => 'required|max:50',
         'release_date' => 'required|date'
       ]);

       $movie = Movie::findOrFail($id);

       $movie->title = $request->input('title');
       $movie->description = $request->input('description');
       $movie->genre = $request->input('genre');
       $movie->director = $request->input('director');
       $movie->actor = $request->input('actor');
       $movie->release_date = $request->input('release_date');
       $movie->save();

       return redirect()->route('admin.movies.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         $movie = Movie::findOrFail($id);
         $movie->delete();

         return redirect()->route('admin.movies.index');
     }
}
