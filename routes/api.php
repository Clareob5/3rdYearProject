<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MovieController as APIMovieController;
// use App\Http\Controllers\dummyAPI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("data",[dummyAPI::class,'getData']);

//creating a route group in middleware therefore we dont need to define middleware after each route
Route::middleware('api')->group(function() {

  //GET /api/movies - display all boooks
  Route::get('/movies', [APIMovieController::class, 'index'])->middleware('api');

  //GET /api/movies/$id - display a specific movie
  Route::get('/movies/{id}', [APIMovieController::class, 'show'])->middleware('api');

  //POST /api/movies - add new movie to db
  //PUT /api/movies/$id - edit existing movies
  //DELTE /api/movies/$id - selete existing movie

});
