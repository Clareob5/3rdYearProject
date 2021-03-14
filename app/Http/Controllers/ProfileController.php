<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use App\Models\Movie;
use App\Models\Group;
use App\Models\User;
use App\Models\UserRecs;
use Auth;
use Hash;
use Storage;

class ProfileController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
      $user_id = Auth::user()->id;
      $count = 6;


      $results = $client->send(
        new Reqs\RecommendItemsToUser($user_id, $count, ['scenario' => 'Top_recommendations'])
      );

      $recomms =  $results['recomms'];

      $movies = Movie::All();
      $group = Group::findOrFail(1);
        return view('user.profile', [
          'movies' => $movies,
          'recomms' => $recomms,
          'group' => $group
        ]);

    }

    public function show(){
      $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
      $user_id = Auth::user()->id;
      $count = 6;


      $results = $client->send(
        new RecommendItemsToUser($user_id, $count, ['scenario' => 'Top_recommendations'])
      );

      $recomms =  $results['recomms'];

      $movies = Movie::All();
        return view('user.profile', [
          'movies' => $movies
        ]);
    }
    public function update(Request $request){
      $request->validate([
        'name'       => 'required|string|min:3|max:191',
        'dob'        => 'required|date',
        'email'      => 'required|email|min:3|max:191',
        'password'   => 'nullable|string|min:5|max:191',
        'image'      => 'file|image', //formats jpg, png, bmp etc
      ]);

      $user = Auth::user();
      $user->name = $request->name;
      $user->dob = $request->dob;
      $user->email = $request->email;

      if($request->hasFile('image')){
        //get image file
        $image = $request->file('image');
        //get just extension
        $extension = $image->getClientOriginalExtension();
        //make a unique name
        $filename = uniqid() .'.'. $extension;
        //upload the image
        $image->storeAs('public/images', $filename);
        //delete the previous image
        Storage::delete("public/images/{$user->image}");
        //this col has a default value so we dont need to set it empty
        $user->image = $filename;

        $user->image->save();
      }

      if($request->password){
        $user->password = Hash::make($request->password);
        $user->save();
      }

      $user->save();
      return redirect()
          ->route('profile.show')
          ->with('status','Your profile has been updated!');

    }
}
