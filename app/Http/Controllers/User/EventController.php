<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Event;


class EventController extends Controller
{

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
    return view('user.groups.event.show', [
      'event' => $event
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
