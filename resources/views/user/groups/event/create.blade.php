@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="card">
                  <div class="card-header">
                    Create Event
                  </div>

                  <div class="panel-body">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      <form method="POST" action="{{ route('user.groups.event.store', $group->id) }}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                              <label for="date">Date</label>
                              <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" />
                          </div>
                          <div class="form-group">
                              <label for="time">Time</label>
                              <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}" />
                          </div>
                          <div class="form-group">
                              <label for="group_id">Group</label>
                              <input type="text" class="form-control" id="group_id" name="group_id" value="{{ $group->id }}" />
                          </div>
                            <a href="{{ route('user.home') }}" class="btn btn-default">Cancel</a>
                          <button type="submit" class="btn btn-primary pull-right">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
