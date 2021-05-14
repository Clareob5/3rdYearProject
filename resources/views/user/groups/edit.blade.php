@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
  <h1>  Edit Group </h1>
</div>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <img src="https://cdn.dribbble.com/users/1731254/screenshots/14820658/media/9c71d6d90a995169a42284238b740ba2.png?compress=1&resize=550x485">
        </div>

        <div class="col-md-6 col-md-offset-2">
            <div class="card box_style">
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
                      <form method="POST" action="{{ route('user.groups.update', $group->id) }}" enctype="multipart/form-data">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="_method" value="PUT">
                          <div class="form-group">
                              <h4 for="user_id">Admin: {{ Auth::user()->name}}</h4>
                          <input type=hidden class="form-control text-light" id="user_id" name="user_id" value="{{ Auth::user()->id}}"/>
                          </div>
                          <div class="form-group">
                              <label for="group_name">Name of Group</label>
                              <input type="text" class="form-control text-light" id="group_name" name="group_name" value="{{ old('group_name', $group->group_name) }}" />
                          </div>
                          <div class="form-group">
                              <label for="users">Add More Members</label>
                              <select class="form-control col-12 text-light" name="members">
                                  <option value="0" selected>Choose One</option>
                                @foreach ($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                              </select>
                              <select class="form-control col-12 text-light" name="member2">
                                  <option value="0" selected>Choose One</option>
                                @foreach ($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div>
                              <a href="{{ route('user.groups.show',$group->id) }}" class="btn btn-default text-light">Cancel</a>
                              <button type="submit" class="btn create_btn float-right">Submit</button>
                            </div>
                      </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
