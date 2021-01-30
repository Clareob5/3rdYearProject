<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function reviews()
    {
      //user has many reviews
      return $this->hasMany('App\Models\Reviews');
    }

    public function users()
    {
      //user has many user watchlist
      return $this->belongsToMany('App\Models\UserWatchlist',  'user_watchlist');
    }
}
