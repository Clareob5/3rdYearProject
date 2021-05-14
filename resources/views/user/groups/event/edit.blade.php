@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <h1>  Edit Event </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <img src="https://cdn.dribbble.com/users/1731254/screenshots/14163159/media/581b5ca79d278c72c5b951c5aff2fad5.png?compress=1&resize=550x480">
        </div>
        <div class="col-md-6 col-md-offset-2">
            <div class="card box_style">
                <div class="card-header">
                    <h4> Admin of {{ $event->group->group_name }}: {{ Auth::user()->name}} </h4>
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
                    <form action="{{ route('user.groups.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="text" class="form-control text-light" name="date" id="date" value="{{ old('date', $event->date) }}" />
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="text" class="form-control text-light" name="time" id="time" value="{{ old('time', $event->time) }}" />
                        </div>
                        {{-- <div class="form-group">
                    <label for="group_name">Group</label>
                    <input type="text" class="form-control text-light" name="group_name" id="group_name" value="{{ old('group_name', $event->group->group_name) }}" />
                </div> --}}
                <div>
                    <a href="{{ route('user.groups.event.show', $event->id) }}" class="btn btn-default text-light">Cancel</a>
                    <button type="submit" class="btn create_btn pull-right">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
