<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
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
}
