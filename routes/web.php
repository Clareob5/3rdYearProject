<?php
# @Date:   2020-10-19T20:17:47+01:00
# @Last modified time: 2020-10-19T20:44:43+01:00




use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('reelsandmeals', function () {
    return '<h1>Reels</h1>';
});
