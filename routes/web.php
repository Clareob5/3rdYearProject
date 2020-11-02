<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
//testing testing
*/



Route::get('/reels', function () {
    return '<h1>Reels and Meals</h1>';
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','admin']],function(){

  Route::get('/dashboard', function () {
      return view('admin.dashboard');
  });
});
