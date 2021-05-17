<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Auth;
use App\Models\User;
use App\Models\Group;
use App\Models\Event;
use App\Models\Movie;


class EventController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function show($id)
  {
    $event = Event::findOrFail($id);
    $group = Group::find($event->group_id);
    $members = $group->users()->paginate(8);

    $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
    $user_id = Auth::user()->id;
    $count = 5;

    //recommendedns 5 movies to user - admin
    $results = $client->send(
      new Reqs\RecommendItemsToUser($user_id, $count)
    );

    $recomms_1 =  $results['recomms']; //setting teh array of movie id to their own array
    $recomms_2 =  [];
    $recs = [];
    $name = 'group-' . $group->id;

    // $client->send(new Reqs\AddUser($name));

    foreach ($group->users as $user) {
      //rem=commendeds 5 movies for the members
      $results_mem = $client->send(
        new Reqs\RecommendItemsToUser($user->id, $count)
      );
      array_push($recomms_2, $results_mem['recomms']);
        //$request->setTimeout(5000);
    }
    //pushing all the recs into one array
    for ($i=0; $i <count($recomms_2) ; $i++) {
      for ($j=0; $j < count($recomms_2[$i]) ; $j++) {
          array_push($recs, $recomms_2[$i][$j]);
        }
    }
    //merging members recs array with user recs array
    $group_recs = array_merge($recs,$recomms_1);


    for ($i=0; $i<count($group_recs); $i++) {
      $book = $client -> send(new Reqs\AddBookmark($name, $group_recs[$i]['id']));
    }

    //sendign the request for recs for the group
    $result = $client->send(
      new Reqs\RecommendItemsToUser($name, 5)
      );
      //$request->setTimeout(5000);

    //the decided movie
    $final_mov = $result['recomms'];

    $movies = Movie::All();
    $groups = Group::ALL();
    return view('user.groups.event.show', [
      'event' => $event,
      'final_mov' => $final_mov,
      'movies' => $movies,
      'groups' => $groups,
      'group' => $group,
      'members' => $members
    ]);
  }

  //function for viewing the selected movie
  function selected(Request $request, $id){

    $user = User::findOrFail(Auth::user()->id);
    $mov_id = $request->input('id');
    $movie = Movie::findOrFail($mov_id);
    $event = Event::findOrFail($id);
    $user->movies()->attach($mov_id); //adding the movie to the watchlist

    //sending a purchase to the recommender
    $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
    $request = new Reqs\AddPurchase(Auth::user()->id, $id, ['cascadeCreate' => true]);
    $request->setTimeout(5000); //increasing the timeout
    $client->send($request);

    return view('user.groups.event.selected', [
      'movie' => $movie,
      'event' => $event
    ]);

  }
  //create event function
  public function createEvent(Request $request, $id)
  {
    //requestint the group and users for the event
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
    //validating the inputs
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

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $event = Event::findOrFail($id);
    return view('user.groups.event.edit', [
      'event' => $event
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
    $request ->validate([
      'date' => 'required',
      'time' => 'required',
      ]);

    $event = Event::findOrFail($id);
    $event->date = $request->input('date');
    $event->time = $request->input('time');
    //$event->group_id = $event->id;
    $event->save();

    return redirect()->route('user.groups.event.show', $event->id);
  }
  //revove member functions - not fully working as routes get confused
  // public function memberRemove(Request $request, $id)
  // {
  //
  //   $group_id=$request->input('group_id');
  //   $group = Group::find($group_id);
  //   $group->users()->detach($id);
  //   //
  //   // $user = User::find(Auth::user()->id);
  //   // $user->movies()->detach($id);
  //
  //   return redirect()->route('user.groups.event.show',$group);
  // }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $event = Event::findOrFail($id);
    $group = $event->group_id;
    $event->delete();

    return redirect()->route('user.groups.show',$group);
  }
}
