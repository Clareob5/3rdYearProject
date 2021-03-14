<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        //an array of properties, takes in an array and status code
        return response()->json([
          'status' => 'success',
          'data' => $movies
        ], 200); //status code 200 (success status)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
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
        ];

        //making a validator that will follow the rules above
        $validator = Validator::make($request->all(), $rules);

        //if validator fails, return an error
        if ($validator->fails()) {
          return response()->json($validator->errors(), 422); //422 unprocessable entity
        }

        //if validator doesnt fail then create a new movie
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

        //return a success response when new movie is created
        return response()->json([
          'status' =>'success',
          'data' => $movie
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);

        if($movie === null) {
          $statusMsg = "Movie not found!";#
          $statusCode = 404;

        }
        else {
          $statusMsg = "Success!";#
          $statusCode = 200;

        }

         return response()->json([
           'status' => $statusMsg,
           'data' => $movie
         ], $statusCode);
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
      $movie = Movie::find($id);

      if($movie === null) {
        return response()->json([
          'status' => 'Movie not found!',
          'data' => null
        ], 404);
      }

      $rules = [
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
      ];

      //making a validator that will follow the rules above
      $validator = Validator::make($request->all(), $rules);

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

      //return a success response when new movie is created
      return response()->json([
        'status' =>'success',
        'data' => $movie
      ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if($movie === null) {
          $statusMsg = "Movie not found!";#
          $statusCode = 404;

        }
        else {
          $movie->delete();
          $statusMsg = "Success!";#
          $statusCode = 200;

        }

         return response()->json([
           'status' => $statusMsg,
           'data' => null
         ], $statusCode);
    }
}
