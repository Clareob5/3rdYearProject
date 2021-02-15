<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\dummyAPI;

use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\ProfileController as ProfileController;
use App\Http\Controllers\User\MovieController as UserMovieController;
use App\Http\Controllers\Admin\MovieController as AdminMovieController;

use App\Http\Controllers\User\ReviewController as UserReviewController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;

use App\Http\Controllers\User\GroupController as UserGroupController;

use App\Http\Controllers\User\EventController as UserEventController;

use App\Http\Controllers\User\UserRecsController as UserRecsController;
use App\Http\Controllers\User\UserWatchlistController as UserWatchlistController;



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
Route::get('/profile/show',[ProfileController::class, 'show'])->name('profile_show.show');

Route::get('/watchlist',[UserWatchlistController::class, 'index'])->name('user.watchlist');


Route::get('/user/movies', [UserMovieController::class, 'index'])->name('user.movies.index');
Route::get('/user/movies/{id}', [UserMovieController::class, 'show'])->name('user.movies.show');

//ADMIN CRDU ROUTES
Route::get('/admin/movies', [AdminMovieController::class, 'index'])->name('admin.movies.index');
Route::get('/admin/movies/create', [AdminMovieController::class, 'create'])->name('admin.movies.create');
Route::get('/admin/movies/{id}', [AdminMovieController::class, 'show'])->name('admin.movies.show');
Route::post('/admin/movies/store', [AdminMovieController::class, 'store'])->name('admin.movies.store');
Route::get('/admin/movies/{id}/edit', [AdminMovieController::class, 'edit'])->name('admin.movies.edit');
Route::put('/admin/movies/{id}', [AdminMovieController::class, 'update'])->name('admin.movies.update');
Route::delete('/admin/movies/{id}', [AdminMovieController::class, 'destroy'])->name('admin.movies.destroy');

//ADMIN review  ROUTE
Route::delete('/admin/books/{id}/reviews/{rid}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');

//USER REVIEWS routes
Route::get('/user/movies/{id}/reviews/create', [UserReviewController::class, 'create'])->name('user.reviews.create');
Route::post('/user/movies/{id}/reviews/store', [UserReviewController::class, 'store'])->name('user.reviews.store');

Route::get('/user/group/create', [UserGroupController::class, 'create'])->name('user.groups.create');
Route::post('/user/group/store', [UserGroupController::class, 'store'])->name('user.groups.store');
Route::get('/user/group/{id}', [UserGroupController::class, 'show'])->name('user.groups.show');

Route::get('/user/event/create', [UserEventController::class, 'create'])->name('user.groups.event.create');
Route::post('/user/event/store', [UserEventController::class, 'store'])->name('user.groups.event.store');
Route::get('/user/event/{id}', [UserEventController::class, 'show'])->name('user.groups.event.show');
Route::post('/user/event/store', [UserEventController::class, 'store'])->name('user.groups.event.store');
Route::get('/user/event/{id}/edit', [UserEventController::class, 'edit'])->name('user.groups.event.edit');
Route::put('/user/event/{id}', [UserEventController::class, 'update'])->name('user.groups.event.update');
Route::delete('/user/event/{id}', [UserEventController::class, 'destroy'])->name('user.groups.event.destroy');

Route::get('/user/genres/create', [UserRecsController::class, 'create'])->name('user.recs.genres');
Route::post('/user/genres/store', [UserRecsController::class, 'store'])->name('user.recs.genres.store');

Route::get('/user/genres/create', [UserRecsController::class, 'createGenre'])->name('user.recs.genres');
Route::post('/user/genres/store', [UserRecsController::class, 'storeGenre'])->name('user.recs.genres.store');
Route::get('/user/movies', [UserRecsController::class, 'createMovie'])->name('user.recs.movies');
Route::post('/user/store/{id}', [UserRecsController::class, 'storeMovie'])->name('user.recs.movies.store');
Route::post('/user/recs/store', [UserRecsController::class, 'store'])->name('user.recs.store');
