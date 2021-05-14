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


use App\Http\Controllers\User\MovieCatalogueController as UserMovieCatalogueController;



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

Route::get('/profile',[ProfileController::class, 'index'])->name('user.profile');
Route::put('/profile',[ProfileController::class, 'update'])->name('user.profile.update');
//Route::get('/user/profile',[ProfileController::class, 'show'])->name('profile.show');

Route::get('/watchlist',[UserWatchlistController::class, 'index'])->name('user.watchlist');
Route::post('/watchlist/add',[UserWatchlistController::class, 'store'])->name('user.watchlist.store');
Route::delete('/watchlist/{id}', [UserWatchlistController::class, 'destroy'])->name('user.watchlist.destroy');

//USER VIEW MOVIE ROUTES
Route::get('/user/movies', [UserMovieController::class, 'index'])->name('user.movies.index');
Route::get('/user/movies/{id}', [UserMovieController::class, 'show'])->name('user.movies.show');

//USER MOVIE CATALOGUE
Route::get('/catalogue', [UserMovieCatalogueController::class, 'index'])->name('user.catalogue');

//ADMIN CRUD ROUTES
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

//USER GROUP routes
Route::get('/user/group/create', [UserGroupController::class, 'createGroup'])->name('user.groups.create');
Route::post('/user/group/store', [UserGroupController::class, 'storeGroup'])->name('user.groups.store');
Route::get('/user/group/{id}', [UserGroupController::class, 'showGroup'])->name('user.groups.show');
Route::post('/user/group/{id}', [UserGroupController::class, 'showEvent'])->name('user.groups.show');
Route::get('/user/group/{id}/edit', [UserGroupController::class, 'edit'])->name('user.groups.edit');
Route::put('/user/group/{id}', [UserGroupController::class, 'update'])->name('user.groups.update');
Route::delete('/user/group/{id}', [UserGroupController::class, 'destroy'])->name('user.groups.destroy');

//USER event routes
Route::get('/user/event/{id}', [UserGroupController::class, 'createEvent'])->name('user.groups.event.create');
Route::post('/user/event/store', [UserGroupController::class, 'storeEvent'])->name('user.groups.event.store');
Route::get('/user/event/show/{id}', [UserEventController::class, 'show'])->name('user.groups.event.show');
Route::get('/user/event/{id}/edit', [UserEventController::class, 'edit'])->name('user.groups.event.edit');
Route::put('/user/event/{id}', [UserEventController::class, 'update'])->name('user.groups.event.update');
Route::delete('/user/event/{id}', [UserEventController::class, 'destroy'])->name('user.groups.event.destroy');
Route::post('/user/selected/{id}', [UserEventController::class, 'selected'])->name('user.groups.event.selected');
//Route::post('/user/group/{id}', [UserEventController::class, 'memberRemove'])->name('user.groups.memberRemove');

//user recs routes - create
Route::get('/user/genres/create', [UserRecsController::class, 'createGenre'])->name('user.recs.create_genres');
Route::post('/user/genres/store', [UserRecsController::class, 'storeGenre'])->name('user.recs.create_genres.store');
Route::get('/user/movies/create/{id}', [UserRecsController::class, 'createMovie'])->name('user.recs.create_movies');
Route::post('/user/movies/store', [UserRecsController::class, 'storeMovie'])->name('user.recs.create_movies.store');

//user recs routes - edit
Route::get('/user/genres/edit/{id}', [UserRecsController::class, 'editGenre'])->name('user.recs.genres');
Route::put('/user/genres/{id}', [UserRecsController::class, 'updateGenre'])->name('user.recs.genres.update');
Route::get('/user/movies/edit/{id}', [UserRecsController::class, 'editMovie'])->name('user.recs.movies');
Route::put('/user/movies/{id}', [UserRecsController::class, 'updateMovie'])->name('user.recs.movies.update');
Route::post('/user/recs/store', [UserRecsController::class, 'store'])->name('user.recs.store');
