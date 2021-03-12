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

  public function create()
  {
    $id = 4;
    $users = User::All();
    $group = Group::findOrFail($id);
    return view('user.groups.event.create', [
      'users' => $users,
      'group' => $group
    ]);
  }

  public function store(Request $request)
  {
      $id = 4;
      $request ->validate([
        'date' => 'required',
        'time' => 'required',
        'group_id' => '',
        ]);

      $event = new Event();
      $event->date = $request->input('date');
      $event->time = $request->input('time');
      $event->group_id = $id;
      $event->save();

      return redirect()->route('user.groups.event.show', $event->id);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $event = Event::findOrFail($id);
    $group = Group::find($event->group_id);

    $client = new Client("alphafilms-dev", 'UCNc5SlThIUbZZMP3VCjMa9vhTXb60VpHps9TiBsD3oQXAKfpS1U8ugXEArsYTlR');
    $user_id = Auth::user()->id;
    $count = 5;

    $results = $client->send(
      new Reqs\RecommendItemsToUser($user_id, $count)
    );

    $recomms_1 =  $results['recomms'];
    $recomms_2 =  [];
    $recs = [];
    $name = 'group-' . $group->id;

    // $client->send(new Reqs\AddUser($name));

    foreach ($group->users as $user) {
      // $client->send("Hello WOrld");

      $results_mem = $client->send(
        new Reqs\RecommendItemsToUser($user->id, $count)
      );
      array_push($recomms_2, $results_mem['recomms']);

    }
    for ($i=0; $i <count($recomms_2) ; $i++) {
      for ($j=0; $j < count($recomms_2[$i]) ; $j++) {
          array_push($recs, $recomms_2[$i][$j]);
        }
    }

    $group_recs = array_merge($recs,$recomms_1);
    print_r($recomms_2);

    print_r($group_recs);

    for ($i=0; $i<count($group_recs); $i++) {
      $book = $client -> send(new Reqs\AddBookmark($name, $group_recs[$i]['id']));
    }

    $result = $client->send(
      new Reqs\RecommendItemsToUser($name, 1)
      );

    $final_mov = $result['recomms'];

    $movies = Movie::All();
    return view('user.groups.event.show', [
      'event' => $event,
      'final_mov' => $final_mov,
      'movies' => $movies
    ]);
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
    $id = 4;
    $request ->validate([
      'date' => 'required',
      'time' => 'required',
      'group_id' => '',
      ]);

    $event = new Event();
    $event->date = $request->input('date');
    $event->time = $request->input('time');
    $event->group_id = $id;
    $event->save();

    return redirect()->route('user.groups.event.show', $event->id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('user.home');
  }
}
