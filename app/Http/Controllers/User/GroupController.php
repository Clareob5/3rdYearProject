<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Event;
use Auth;
use Illuminate\Support\Facades\Validator;

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

        print_r($request->input('users'));

        $members = $request->input('users');
        $group->users()->sync($members);
        //$group->fill($request->input('users'))->save();
        // $group->users()->attach($users);

      }else{
        $group = $request->session()->get('groups');
        $group = new Group();
        $group->user_id = $request->Auth::user()->id;
        $group->group_name = $request->input('group_name');
        $group->save();
      }

      return redirect()->route('user.groups.show', $group->id);
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
      $rules = [
        'date' => 'required',
        'time' => 'required',
        'group_id' => '',
        ];

        //making a validator that will follow the rules above
        $validator = Validator::make($request->all(), $rules);

        //if validator fails, return an error
        if ($validator->fails()) {
          return response()->json($validator->errors(), 422); //422 unprocessable entity
        }

      if(empty($request->session()->get('groups'))){
            $event = new Event();
            $event->date = $request->input('date');
            $event->time = $request->input('time');
            $event->group_id = $request->input('group_id');
            $event->save();
      }

      return response()->json(['code'=>200, 'success'=>true, 'message'=>'Event Created successfully','data' => $event], 200);

      // return response()->json(['ok' => 'ok']);

      // return response()->json([
      //   'ok' => 'ok',
      //   'success' => true,
      //   'data' => $event
      // ], 200);

      // return [
      //   'success' => true,
      //   'data' => $event
      // ];
      // return redirect()->route('user.groups.show', $event->group_id);
  }

  public function showGroup($id)
  {

    $user = Auth::user();

    //$groups = $user->groups()->orderBy('date', 'asc')->paginate(8);
  //  $events = $group->events()->orderBy('date', 'asc')->paginate(8); //displatying only visits relevant to authorised patient viewing the page

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

  public function showEvent($id)
  {

    $user = Auth::user();
    //$events = $group->events()->orderBy('date', 'asc')->paginate(8); //displatying only visits relevant to authorised patient viewing the page

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
