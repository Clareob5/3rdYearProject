<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Event;
use Auth;
use Illuminate\Support\Facades\Cache;
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

  public function storeGroup(Request $request)
  {
      //var_dump($request->input('members[]'));
      $request ->validate([
        'group_name' => 'required|max:191',
        'members' => 'required',
        'member2' => 'nullable'

        ]);
      if(empty($request->session()->get('groups'))){
        $group = new Group();
        $group->user_id = $request->input('user_id');
        $group->group_name = $request->input('group_name');
        $group->save();

        $members = $request->input('members');
        $group->users()->attach($members);
        $member2 = $request->input('member2');
        $group->users()->attach($member2);
        //$group->fill($request->input('users'))->save();
        // $group->users()->attach($users);

      }else{
        $group = $request->session()->get('groups');
        $group = new Group();
        $group->user_id = $request->Auth::user()->id;
        $group->group_name = $request->input('group_name');
        $group->save();

        $members = $request->input('members');
        $group->users()->attach($members);
        $member2 = $request->input('member2');
        $group->users()->attach($member2);
      }

      return redirect()->route('user.groups.show', $group->id);
  }


  public function showGroup($id)
  {

    $user = Auth::user();
    $group = Group::findOrFail($id);
    //$members = Group::with('users')->get();

    $members = $group->users()->paginate(8);
    //$events = $group->events()->orderBy('date', 'asc')->paginate(8); //displatying only visits relevant to authorised patient viewing the page


      $groups = Group::All();
      $events = Event::All();
      return view('user.groups.show', [
        'group' => $group,
        'groups' => $groups,
        'events' => $events,
        'members' => $members
      ]);
  }

  public function edit($id)
  {
    $group = Group::findOrFail($id);
    $users = User::All();
    return view('user.groups.edit', [
      'group' => $group,
      'users' => $users
    ]);

    return response()->json(['code'=>200, 'message'=>'Group Edited successfully','data' => $group], 200);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {

    $request ->validate([
      'group_name' => 'required|max:191',
      'members' => 'required',
      'member2' => 'nullable'

      ]);
      $group = Group::findOrFail($id);
      $group->user_id = Auth::user()->id;
      $group->group_name = $request->input('group_name');
      $group->save();

      if($request->input('members') == 0){
        return redirect()->route('user.groups.show', $group->id);
      }else{
        $members = $request->input('members');
        $group->users()->attach($members);
      }
      if($request->input('members2') == 0){

      }else{
        $members = $request->input('members2');
        $group->users()->attach($members);
      }

    return redirect()->route('user.groups.show', $group->id);
  }

  public function refresh($id){
      $group = Group::findOrFail($id);
    return redirect()->route('user.groups.show', $group->id);
  }

  public function showEvent($id)
  {

    $user = Auth::user();
    $members = Group::with('users')->get();
    //$events = $group->events()->orderBy('date', 'asc')->paginate(8); //displatying only visits relevant to authorised patient viewing the page

      $group = Group::findOrFail($id);
      $groups = Group::All();
      $events = Event::All();
      return view('user.groups.show', [
        'group' => $group,
        'groups' => $groups,
        'events' => $events,
        'members' => $members
      ]);
  }

  public function createEvent(Request $request, $id)
  {
    $group = $request->session()->get('groups');
    $users = User::All();
    $group = Group::findOrFail($id);
    $members = $group->users()->paginate(8);
    return view('user.groups.event.create',compact('group','members'), [
      'users' => $users,
      'group' => $group,
      'members'=> $members
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

// /**
// * Remove the specified resource from storage.
// *
// * @param  int  $id
// * @return \Illuminate\Http\Response
// */

public function memberRemove(Request $request, $id)
{
  var_dump($id);
  $group_id=$request->input('group_id');
  $group = Group::find($group_id);
  $group->users()->detach($id);
  //
  // $user = User::find(Auth::user()->id);
  // $user->movies()->detach($id);

  return redirect()->route('user.groups.show',$group);
}

public function destroy($id)
{
  $group = Group::findOrFail($id);
  $group->users()->detach();
  $group->delete();

  return redirect()->route('user.home');
}
}
