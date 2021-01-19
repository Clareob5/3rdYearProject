<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;

class GroupController extends Controller
{
  public function create()
  {
    $users = User::All();
    return view('user.groups.create', [
      'users' => $users
    ]);
  }

 /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
      $request ->validate([
        'group_name' => 'required|max:191',
        'user_id' => 'required'
        ]);

      $group = new Group();
      $group->group_name = $request->input('group_name');
      $group->user_id = $request->input('user_id');
      $group->save();

      return redirect()->route('user.groups.event.create', $group->id);
  }
}
