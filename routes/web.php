<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\dummyAPI;

use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\MovieController as UserMovieController;
use App\Http\Controllers\Admin\MovieController as AdminMovieController;



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


// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

Route::get('/', [PageController::class, 'welcome'])->name('welcome'); //when user enters / , it uses wlecome method to take them to welcome view
Route::get('/about', [PageController::class, 'about'])->name('about'); //when user goes to /about , it uses welcome method to take them to about view

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//routes to admin and user home dashboards
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [UserHomeController::class, 'index'])->name('user.home');

Route::get('/profile',[ProfileController::class, 'index'])->name('profile.index');
Route::put('/profile',[ProfileController::class, 'update'])->name('profile.update');

Route::get('/user/movies', [UserMovieController::class, 'index'])->name('user.movies.index');
Route::get('/user/movies/{id}', [UserMovieController::class, 'show'])->name('user.movies.show');

Route::get('/admin/movies', [AdminMovieController::class, 'index'])->name('admin.movies.index');
Route::get('/admin/movies/create', [AdminMovieController::class, 'create'])->name('admin.movies.create');
Route::get('/admin/movies/{id}', [AdminMovieController::class, 'show'])->name('admin.movies.show');
Route::post('/admin/movies/store', [AdminMovieController::class, 'store'])->name('admin.movies.store');
Route::get('/admin/movies/{id}/edit', [AdminMovieController::class, 'edit'])->name('admin.movies.edit');
Route::put('/admin/movies/{id}', [AdminMovieController::class, 'update'])->name('admin.movies.update');
Route::delete('/admin/movies/{id}', [AdminMovieController::class, 'destroy'])->name('admin.movies.destroy');

// Route::group(['middleware'=>['auth','admin']],function(){
//
// Route::get('/dashboard', function () {
//       return view('admin.dashboard');
//   });
// });

// Auth::routes();
//
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
