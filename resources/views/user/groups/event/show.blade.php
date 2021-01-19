@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  Event Details
                </div>

                <div class="card-body">
                      <table class="table table-hover">
                        <tbody>

                            <tr>
                              <td>Date</td>
                              <td>{{ $event->date }}</td>
                            </tr>

                            <tr>
                              <td>Time</td>
                              <td>{{ $event->time }}</td>
                            </tr>

                            <tr>
                              <td>Group Members</td>
                              <td>{{ $event->group_id }}</td>
                            </tr>

                      <a href="{{ route('user.home') }}" class="btn btn-default">Back</a>
                      <a href="{{ route('user.groups.event.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                      <form style="display:inline-block" method="POST" action="{{ route('user.groups.event.destroy', $event->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-danger">Delete</a>
                      </form>


                </div>
            </div>
      </div>
  </div>
@endsection
