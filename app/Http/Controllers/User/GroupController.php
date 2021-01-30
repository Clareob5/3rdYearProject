<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Event;
use Auth;
class GroupController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

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

  public function show($id)
  {
      $group = Group::findOrFail($id);
      $groups = Group::All();
      $events = Event::All();
      $users = User::All();
      return view('user.groups.show', [
        'group' => $group,
          'groups' => $groups,
        'events' => $events,
        'users' => $users
      ]);
  }
}

// public function show()
// {
//     $groups = Group::All();
//     return view('user.groups.event.show', [
//       'groups' => $groups
//     ]);
// }
//
// /**
// * Show the form for editing the specified resource.
// *
// * @param  int  $id
// * @return \Illuminate\Http\Response
// */
// public function edit($id)
// {
//    //
// }
//
// /**
// * Update the specified resource in storage.
// *
// * @param  \Illuminate\Http\Request  $request
// * @param  int  $id
// * @return \Illuminate\Http\Response
// */
// public function update(Request $request, $id)
// {
//    //
// }
//
// /**
// * Remove the specified resource from storage.
// *
// * @param  int  $id
// * @return \Illuminate\Http\Response
// */
// public function destroy($id)
// {
//   $group = Group::findOrFail($id);
//   $group->delete();
//
//   return redirect()->route('user.home');
// }
// }
