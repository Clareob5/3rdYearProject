<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

use Storage;

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
           'director' => 'required|max:2000',
           'cast' => 'required|max:2000',
           'country' => 'required|max:191',
           'date_added' => 'required|max:1900',
           'cover' => 'file|image',
           'release_year' => 'required|integer|min:1900',
           'rating' => 'required|max:50',
           'duration' => 'required|max:50',
           'genre' => 'required|max:191',
           'description' => 'required|max:555'
         ]);

         $movie = new Movie();

         if($request->hasFile('cover'))
         {
          $cover= $request->file('cover');
          $extension = $cover->getClientOriginalExtension();
          $filename = date('Y-m-d-His') . '_' . $request->input('date_added') . '.' . $extension;

          $path = $cover->storeAs('public/covers', $filename);
          $movie->cover = $filename;
         }

         $movie->title = $request->input('title');
         $movie->director = $request->input('director');
         $movie->cast = $request->input('cast');
         $movie->country = $request->input('country');
         $movie->date_added = $request->input('date_added');
         $movie->release_year = $request->input('release_year');
         $movie->rating = $request->input('rating');
         $movie->duration = $request->input('duration');
         $movie->genre = $request->input('genre');
         $movie->description = $request->input('description');
         $movie->save();

         $request->session()->flash('success', 'Movie added successfully');

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
         'director' => 'required|max:2000',
         'cast' => 'required|max:2000',
         'country' => 'required|max:191',
         'date_added' => 'required|max:1900',
         'release_year' => 'required|integer|min:1900',
         'rating' => 'required|max:50',
         'duration' => 'required|max:50',
         'genre' => 'required|max:191',
         'description' => 'required|max:555'
       ]);

       $movie = Movie::findOrFail($id);

       if($request->hasFile('cover'))
      {
        $cover= $request->file('cover');
        $extension = $cover->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('date_added') . '.' . $extension;

        $path = $cover->storeAs('public/img', $filename);
        $movie->cover = $filename;
     }

       $movie->title = $request->input('title');
       $movie->director = $request->input('director');
       $movie->cast = $request->input('cast');
       $movie->country = $request->input('country');
       $movie->date_added = $request->input('date_added');
       $movie->release_year = $request->input('release_year');
       $movie->rating = $request->input('rating');
       $movie->duration = $request->input('duration');
       $movie->genre = $request->input('genre');
       $movie->description = $request->input('description');
       $movie->save();

       $request->session()->flash('info', 'Movie edited successfully');

       return redirect()->route('admin.movies.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $id)
     {
         $movie = Movie::findOrFail($id);
         Storage::delete("public/covers/{$movie->cover}");
         $movie->delete();

         $request->session()->flash('danger', 'Movie deleted');

         return redirect()->route('admin.movies.index');
     }
}
