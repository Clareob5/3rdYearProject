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
                              <label for="user_id">Admin {{ Auth::user()->name}}</label>
                          <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id}}"/>
                          </div>
                          <div class="form-group">
                              <label for="group_name">Name</label>
                              <input type="text" class="form-control" id="group_name" name="group_name" value="{{ old('group_name') }}" />
                          </div>
                          <div class="form-group">
                              <label for="users">Members</label>
                              <select class="form-control col-5" name='users'>
                                @foreach ($users as $user)
                                  <option type="checkbox" name="users[]" value="{{ $user->id }}" >{{ $user->name }}</option>
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
