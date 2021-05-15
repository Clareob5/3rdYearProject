@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="title col-md-2">
            <h3>Groups</h3>
            <div class="box_style_three card h-100">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @foreach ($groups as $group)
                            @if($group->user_id == Auth::user()->id)
                                <tr>
                                    <td><a href="{{route('user.groups.show', $group->id)}}" class="text-light">{{ $group->group_name }}</a></td>
                                </tr>
                                @endif
                                @endforeach
                                <tr>
                                    <td><a href="{{ route('user.groups.create') }}" class="btn light_button">Create Group</a></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8 title">
            <h3>{{$group->group_name}}</h3>
            <div class="card box_style_four h-100">
                <div class="card-body">
                    <table class="table table-hover text-light">
                        <tbody>
                            <tr>
                                <td>Date</td>
                                <td>
                                    <p>{{ date('j F, Y', strtotime($event->date )) }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td>Time</td>
                                <td>{{ date('G:i', strtotime($event->time)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-light"><a href="{{ route('user.groups.show', $event->group_id) }}" class="btn btn-outline-light">Back to Events</a>
                        <a href="{{ route('user.groups.event.edit', $event->id) }}" class="btn light_button">Edit Event</a>
                        <form style="display:inline-block" method="POST" action="{{ route('user.groups.event.destroy', $event->id) }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger">Delete Event</a>
                        </form>
                    </div>
                </div>
                <div class="text-light padding2">
                    <h4>Select a movie to watch:</h4>
                </div>
                <div class="card-group padding">
                    @foreach ($movies as $movie)
                    @for ($i=0; $i < 5; $i++) @if ($movie->id == $final_mov[$i]['id'])
                    <div class="card bgcardcolor">
                        <a href="{{ route('user.movies.show', $movie->id) }}">
                            <img class="card-img-top img-top" src="{{ '/assets/img/' . $movie->cover }}" alt="Card image cap" height="240"></a>
                        <div class="card body bgcardcolor text-white">
                            <h6>{{ $movie->title }}</h6>
                            <h6>( {{ $movie->release_year }} )</h6>
                            <div>
                                <form style="display:inline-block" method="POST" action="{{ route('user.groups.event.selected', $event->id) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{$movie->id}}">
                                    <div class="topspace">
                                    <button type="submit" class="btn create_btn">Select</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endfor
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2 title">
            <h3>Members</h3>

            <div class="card box_style_three h-100">
                <div class="card-body">
                    <p>Admin: {{ $group->user->name}}</p>

                    @foreach ($members as $member)

                      <p>
                        {{-- <form method="POST" action="{{ route('user.groups.memberRemove', $member->id) }}">
                            <input type="hidden" name="group_id" value="{{ $group->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                            {{ $member->name }}
                            {{-- <button type="submit" class="btn btn-outline-danger margin_left btn-sm">Remove</button>
                        </form> --}}
                        </p>

                    @endforeach


                    <a href="{{ route('user.groups.edit', $group->id) }}" class="btn light_button">Edit Group</a>
                    <form style="display:inline-block" method="POST" action="{{ route('user.groups.destroy', $group->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete Group</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
