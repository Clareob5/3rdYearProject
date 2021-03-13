<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dob',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public static $laracombee = ['name' => 'string', 'dob' => 'date', 'email' => 'string'];
    //
    // $client->send(new AddUser(3));

    public function reviews()
    {
      //user has many reviews
      return $this->hasMany('App\Models\Review');
    }

    public function userRecs()
    {
      //user has many user recs
      return $this->hasMany('App\Models\UserRecs');
    }

    public function movies()
    {
      //user has many user watchlist
      return $this->belongsToMany('App\Models\Movie', 'user_watchlists', 'user_id', 'movie_id');
    }

    public function groups(){
        return $this->belongsToMany('App\Models\Group', 'user_group');
    }

    public function roles()
    {
      return $this->belongsToMany('App\Models\Role', 'user_role');
    }

    public function authorizeRoles($roles)
    {
      if (is_array($roles)) {
        return $this->hasAnyRole($roles); //short circuit syntax
      }
      return $this->hasRole($roles);
    }

    public function hasAnyRole($roles) //for checking list of roles
    {
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role) //for checking one specific role
    {
      return null !== $this->roles()->where('name', $role)->first();
    }
}
