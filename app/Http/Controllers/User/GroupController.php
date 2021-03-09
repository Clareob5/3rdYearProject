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
    $this->middleware('role:user');
  }

  public function createGroup(Request $request)
  {
    $group = $request->session()->get('groups');
    $users = User::All();
    return view('user.groups.create',compact('group'), [
      'users' => $users
    ]);

    return response()->json(['code'=>200, 'message'=>'Group Created successfully','data' => $group], 200);
  }

 /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function storeGroup(Request $request)
  {
      $request ->validate([
        'group_name' => 'required|max:191',

        ]);
      if(empty($request->session()->get('groups'))){
        $group = new Group();
        $group->user_id = $request->input('user_id');
        $group->group_name = $request->input('group_name');
        $group->save();
        //$group->users()->attach($request->input['users']);

      }else{
        $group = $request->session()->get('groups');
        $group = new Group();
        $group->user_id = $request->Auth::user()->id;
        $group->group_name = $request->input('group_name');
        $group->save();
      }

      return redirect()->route('user.groups.event.create', $group->id);
  }

  public function createEvent(Request $request, $id)
  {
    $group = $request->session()->get('groups');
    $users = User::All();
    $group = Group::findOrFail($id);
    return view('user.groups.event.create',compact('group'), [
      'users' => $users,
      'group' => $group
    ]);

    return response()->json(['code'=>200, 'message'=>'Event Created successfully','data' => $group], 200);

  }

  public function storeEvent(Request $request)
  {
      $request ->validate([
        'date' => 'required',
        'time' => 'required',
        'group_id' => '',
        ]);

      if(empty($request->session()->get('groups'))){
            $event = new Event();
            $event->date = $request->input('date');
            $event->time = $request->input('time');
            $event->group_id = $request->input('group_id');
            $event->save();
      }
      return redirect()->route('user.groups.show', $event->group_id);
  }

  public function showGroup($id)
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
