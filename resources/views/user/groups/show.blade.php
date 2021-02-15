@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2 card">
            <h3>Groups</h3>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <td>{{ $group->group_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Group Details
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                          <tr>
                              <td>Name</td>
                              <td>{{ $group->group_name}}<td>

                          </tr>
                            <tr>
                                <td>Admin</td>
                                <td>{{ $group->user->name }}</td>
                            </tr>

                            <div class="card-body">
                                @if (count($group->events) == 0)
                                <p>There are no events for this group.</p>
                                @else
                                <table class="table">
                                    <thead>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($group->events as $event)
                                        <tr>
                                            <td>{{ $event->date }}</td>
                                            <td>{{ $event->time }}</td>
                                            <td><form style="display:inline-block" method="POST" action="{{ route('user.groups.event.destroy', $event->id) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger">Delete</a>
                                            </form></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif

                                <tr>
                                    <td><a href="{{ route('user.home') }}" class="btn btn-default">Back</a>
                                        {{-- <a href="{{ route('user.groups.event.edit', $group->event->id) }}" class="btn btn-warning">Edit</a> --}}

                                    </td>
                                </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-2 card">
            <div class="card-body">
                <h3>Members</h3>
                <p>{{ $group->user->name}}</p>
                <p>Ben Teck</p>

                <a href="" class="btn btn-warning">Edit</a>
                <div>
                    <form style="display:inline-block" method="POST" action=""> {{-- {{ route('user.group.destroy') }} --}}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
