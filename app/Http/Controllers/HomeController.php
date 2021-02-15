<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; ///importing auth for Auth command below to work

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      $user = Auth::user(); //retrieves authenticated user
      $home = 'home'; //if not admin or user, takes them to regular home screen

      if($user->hasRole('admin')){ //check if user has an admin role and directs them to admin home page
        $home = 'admin.home';
      }
      else if($user->hasRole('user')){ //check if user has an ordinary users role and direct them to correct users home page
        $home = 'user.home';
      }

        return redirect()->route($home); //redirect using home route
    }
}
