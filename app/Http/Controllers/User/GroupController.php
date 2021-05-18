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
    //start a session for cretaing a group
    $group = $request->session()->get('groups');
    $users = User::All(); //get all users
    //return view for creating grou[]
    return view('user.groups.create',compact('group'), [
      'users' => $users
    ]);

  }

  public function storeGroup(Request $request)
  {
      //validate the inputs
      $request ->validate([
        'group_name' => 'required|max:191',
        'members' => 'required|integer',
        'member2' => 'nullable|integer'

        ]);
      //create a new group and save the data to the database
      if(empty($request->session()->get('groups'))){
        $group = new Group();
        $group->user_id = $request->input('user_id');
        $group->group_name = $request->input('group_name');
        $group->save();

        //attach the inputted memebrs tothe group and save in pivot table
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

        //attach the inputted memebrs tothe group and save in pivot table
        $members = $request->input('members');
        $group->users()->attach($members);
        $member2 = $request->input('member2');
        $group->users()->attach($member2);
      }

      //redirect to the show page of the created group
      return redirect()->route('user.groups.show', $group->id);
  }

  //shows the groups members and events
  public function showGroup($id)
  {
    $user = Auth::user();
    $group = Group::findOrFail($id);
    //$members = Group::with('users')->get();

    $members = $group->users()->paginate(8);
    //$events = $group->events()->orderBy('date', 'asc')->paginate(8); //displatying only visits relevant to authorised patient viewing the page
    $events = $group->events;
    $groups = Group::All();
      //$events = Event::All();
      return view('user.groups.show', [
        'group' => $group,
        'groups' => $groups,
        'events' => $events,
        //'event' => $event,
        'members' => $members
      ]);
  }

  public function edit($id)
  {
    //find the group by the passed in id
    $group = Group::findOrFail($id);
    $users = User::All();
    //return edit group view
    return view('user.groups.edit', [
      'group' => $group,
      'users' => $users
    ]);

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
    //validate the entered data
    $request ->validate([
      'group_name' => 'required|max:191',
      'members' => 'required|integer',
      'member2' => 'nullable|integer'

      ]);
      //find the group in the db adn b=pass data to it
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
        $group->users()->attach($members); //using attach to connect the user to the group in user_group table
      }

    return redirect()->route('user.groups.show', $group->id);
  }

  public function refresh($id){
      $group = Group::findOrFail($id);
    return redirect()->route('user.groups.show', $group->id);
  }

// function that shows the newly added event on the page with event info and saved to specific group using the group id.
  public function showEvent($id)
  {
    $user = Auth::user();
    $group = Group::find($id);
    $members = $group->users()->paginate(8);
    //$events = $group->events()->orderBy('date', 'asc')->paginate(8); //displatying only visits relevant to authorised patient viewing the page


      $groups = Group::All();
      $events = $group->events;
      return view('user.groups.show', [
        'group' => $group,
        'groups' => $groups,
        'events' => $events,
        'members' => $members
      ]);
  }

// function to allow a user to create an event for a certain group by ID. If successful it will return a success message to show group is created successfully.
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

// function that stores inputted data from form into the databse and saving it to the specific group using the group id. 
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

  }



public function destroy($id)
{
  $group = Group::findOrFail($id);
  $group->users()->detach();
  $group->delete();

  return redirect()->route('user.home');
}
}
