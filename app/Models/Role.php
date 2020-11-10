<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

//the user that belongs to the roles

    public function users()
    {
      return $this->belongsToMany('App\Models\User');
    }
}
