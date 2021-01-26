<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRecs extends Model
{
    use HasFactory;

    public function movie()
    {
      return $this->belongsTo('App\Models\Movie');
    }

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }

    protected $fillable = ['genres'];

    protected $casts = [
        'genres' => 'json'
    ];

    public function setGenreAttribute($value)
    {
        $this->attributes['genres'] = json_encode($value);
    }

    public function getGenreAttribute($value)
    {
        return $this->attributes['genres'] = json_decode($value);
    }

}
