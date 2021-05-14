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
                  <h4>  Admin of Group: {{ Auth::user()->name}} </h4>


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
                          {{-- <label for="user_id">Admin: {{ Auth::user()->name}}</label>
                          <input type=hidden class="form-control text-light" id="user_id" name="user_id" value="{{ Auth::user()->id}}"/> --}}
                          </div>
                          <div class="form-group">
                              <label for="group_name">Name of Group</label>
                              <input type="text" class="form-control text-light" id="group_name" name="group_name" value="{{ old('group_name') }}" />
                          </div>
                          <div class="form-group dropdown">
                              <label for="users">Add Members</label>
                              <select class="form-control col-12 text-light" name="members">
                                    <option value="0" selected>Choose One</option>
                                @foreach ($users as $user)
                                  <option class="dropdown-item" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                              </select>
                              <select class="form-control dropdown col-12 text-light dropdown-menu-dark" name="member2">
                                <option value="0" selected>Choose One</option>
                                @foreach ($users as $user)
                                  <option class="dropdown-item" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                              </select>
                            </div>
                              <div>
                              <a href="{{ route('user.home') }}" class="btn btn-outline-dark">Cancel</a>
                          <button type="submit" class="btn create_btn float-right">Submit</button>
                            </div>
                      </form>
              </div>
          </div>
      </div>
</div>

  </div>
@endsection
