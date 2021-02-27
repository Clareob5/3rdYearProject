@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8 col-md-offset-2">
              <div class="card box_style">
                  <div class="card-header">
                    Create Group {{ Auth::user()->name}}
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
                      <form method="POST" action="{{ route('user.groups.store') }}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                              <label for="group_name">Name</label>
                              <input type="text" class="form-control" id="group_name" name="group_name" value="{{ old('group_name') }}" />
                          </div>
                          <div class="form-group">
                              <label for="user">Members</label>
                              <select class="form-control col-6" name='user_id'>
                                @foreach ($users as $user)
                                  <option value="{{ $user->id }}" {{ ($user->id) ? "selected" : "" }}>{{ $user->name }}</option>
                                @endforeach
                              </select>
                          <a href="{{ route('user.home') }}" class="btn btn-default">Cancel</a>
                          <button type="submit" class="btn btn-primary pull-right">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
