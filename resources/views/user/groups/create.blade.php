@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
        <h1> Create a Group</h1>
      </div>


  <div class="container">
      <div class="row justify-content-center">





        <div class="col-md-6">
          <img src="https://cdn.dribbble.com/users/1731254/screenshots/14926309/media/d3657e8def0fe958cbb853f692f8dd97.png?compress=1&resize=550x550">
        </div>

          <div class="col-md-6 col-md-offset-2">
              <div class="card box_style">
                  <div class="card-header">
                  <h4>  Admin of Group: {{ Auth::user()->name}} </h4>
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
                              <h5 for="user_id"> Name your group and add members!</h5>
                          <input type="hidden" class="form-control text-light" id="user_id" name="user_id" value="{{ Auth::user()->id}}"/>
                          </div>
                          <div class="form-group">
                              <label for="group_name">Name</label>
                              <input type="text" class="form-control text-light" id="group_name" name="group_name" value="{{ old('group_name') }}" />
                          </div>
                          <div class="form-group">
                              <label for="users">Members</label>
                              <select class="form-control col-5 text-light" multiple>
                                @foreach ($users as $user)
                                  <option  value="{{ $user->id }}">{{ $user->name }}</option>
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
