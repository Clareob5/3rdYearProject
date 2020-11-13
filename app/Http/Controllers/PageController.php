<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
      return view('welcome'); //redirects to welcome page by redirecting to welcome view

    }

    public function about()
    {
      return view('about'); //redirects to about page by redirecting to about view

    }
}
