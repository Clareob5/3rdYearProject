@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <div class="card">
       <div class="card-header">
         Edit Event
       </div>

       <div class="card-body">
         @if($errors->any())
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
                    <input type="text" class="form-control" name="date" id="date" value="{{ old('date', $event->date) }}" />
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="text" class="form-control" name="time" id="time" value="{{ old('time', $event->time) }}" />
                </div>
                <div class="form-group">
                    <label for="group_name">Group</label>
                    <input type="text" class="form-control" name="group_name" id="group_name" value="{{ old('group_name', $event->group_id) }}" />
                </div>
                <div>
                  <a href="{{ route('user.groups.event.show') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
           </div>
        </div>
      </div>
   </div>
</div>
@endsection
