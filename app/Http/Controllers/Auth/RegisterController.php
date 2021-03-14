<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use App\Models\Register;
use App\Models\UserRecs;
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/genres/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

      $user = new User();
      $user->name = $data['name'];
      $user->dob = $data['dob'];
      $user->email = $data['email'];
      $user->password = Hash::make($data['password']);


      $user->save();
      $user->roles()->attach(Role::where('name','user')->first());//using  where query to attach the patietn role to the user

    //   $client -> send(new Reqs\SetUserValues("$user->id",
    //   // values
    //   [
    //   "name" => "$user->name",
    //   "email" => "$user->email"
    //   ],
    //   //optional parameters
    //   [
    //   "cascadeCreate" => true
    //   ]
    // ));




      return $user; //returns new user. By default, new users will have a user role, not admin
    }




}
