@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8 col-md-offset-2">
              <div class="card box_style">
                  <div class="center_text">
                    Create Group for {{ Auth::user()->name}}
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
                              <label for="user_id">Admin: {{ Auth::user()->name}}</label>
                          <input type=hidden class="form-control text-light" id="user_id" name="user_id" value="{{ Auth::user()->id}}"/>
                          </div>
                          <div class="form-group">
                              <label for="group_name">Name of Group</label>
                              <input type="text" class="form-control text-light" id="group_name" name="group_name" value="{{ old('group_name') }}" />
                          </div>
                          <div class="form-group dropdown">
                              <label for="users">Add Members</label>
                              <select class="form-control col-7 text-light" name="members">
                                @foreach ($users as $user)
                                  <option class="dropdown-item" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                              </select>
                              <select class="form-control dropdown col-7 text-light dropdown-menu-dark" name="member2">
                                @foreach ($users as $user)
                                  <option class="dropdown-item" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                              </select>
                              <a href="{{ route('user.home') }}" class="btn btn-default">Cancel</a>
                          <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                      </form>

              </div>
          </div>
      </div>
  </div>
@endsection
