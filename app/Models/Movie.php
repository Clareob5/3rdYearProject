<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // public static $laracombee = ['title' => 'string', 'director' => 'string', 'cast' => 'string', 'country' => 'string', 'release_year' => 'integer', 'rating' => 'string', 'duration' => 'string', 'listed_in' => 'string'];

    public function reviews()
    {
      //user has many reviews
      return $this->hasMany('App\Models\Reviews');
    }

    public function users()
    {
      //user has many user watchlist
      return $this->belongsToMany('App\Models\User', 'user_watchlists', 'movie_id', 'user_id');
    }
}
