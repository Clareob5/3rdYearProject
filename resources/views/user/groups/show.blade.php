@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-3 box_style_two card ">
          <div class="card-header">
            Groups
          </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        @foreach (Auth::user()->groups as $group)
                        <tr>
                            <td class="text-light">{{ $group->group_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card box_style_two">
                <div class="card-header">
                  Group Details
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                          <tr>
                              <td class="text-light">Name:</td>
                              <td class="text-light">{{ $group->group_name}}<td>

                          </tr>
                            <tr>
                                <td class="text-light">Admin:</td>
                                <td class="text-light">{{ $group->user->name }}</td>
                            </tr>

                            <div class="card-body">
                                @if (count($group->events) == 0)
                                <p class="text-light">There are no events for this group.</p>
                                @else
                                <table class="table">
                                    <thead>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach ($group->events as $event)
                                        <tr>
                                            <td class="text-light">{{ $event->date }}</td>
                                            <td class="text-light">{{ $event->time }}</td>
                                            <td><a href="{{ route('user.groups.event.show', $event->id) }}" class="btn btn-secondary">View</a>
                                              <form style="display:inline-block" method="POST" action="{{ route('user.groups.event.destroy', $event->id) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger">Delete</a>
                                            </form></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif

                                <tr>
                                    <td><a href="{{ route('user.home') }}" class="btn btn-default text-light">Back</a>
                                        <a href="javascript:void(0)" class="btn btn-success" id="create-new-event" onclick="addEvent()">Add</a>
                                      <a href="" class="btn btn-warning" data-id="{{ $group->id }}" onclick="editGroup(event.target)">Edit</a>

                                    </td>
                                </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-3 card box_style_two">
            <div class="card-body">
              <div class="card-header">
                Members
              </div>
                <p>{{ $group->user->name}}</p>
                {{-- @foreach ($iterable as $key => $value)

                @endforeach
                <p>{{ $group->user_group->user->name }}</p> --}}

                {{-- <a href="" class="btn btn-warning">Edit</a>
                <div>
                    <form style="display:inline-block" method="POST" action=""> {{-- {{ route('user.group.destroy') }}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</a>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="group-modal" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content box_style">
      <div class="modal-header">
          <h4 class="modal-title">Add an Event</h4>
      </div>
      <div class="modal-body">
          <!-- <form method="POST" action="// route('user.groups.event.store', $group->id) }}"> -->
          <form method="POST" action="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control text-light" id="date" name="date" value="{{ old('date') }}" />
                      <span id="dateError" class="alert-message"></span>
                  </div>

              <div class="form-group">
                  <label for="time">Time</label>
                       <input type="time" class="form-control text-light" id="time" name="time" value="{{ old('time') }}" />
                      <span id="timeError" class="alert-message"></span>
                  </div>

                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" onclick="createEv()">Save</button>
                  </div>

          </form>
      </div>
      <!-- // -->
  </div>
</div>
</div>
@endsection

@section('javascript')
<script>
function createEv() {
  // e.preventDefault();
    console.log("Checking create event")
  var date = $('#date').val();
  var time = $('#time').val();

  let _url     = "{{ route("user.groups.event.store") }}";
  let _token   = "{{ csrf_token() }}";

    $.ajax({
      url: _url,
      type: "POST",
      data: {
        group_id: {{ $group->id }},
        date: date,
        time: time,
        _token: _token
      },
      dataType: "json",
      success: function(response) {
        // console.log(response);
        console.log(response.data.date);
        console.log(response.data.time);
        console.log(response.data.id);
          if(response.code == 200) {

            if(id != ""){
              $("#row_"+id+" td:nth-child(2)").html(response.data.date);
              $("#row_"+id+" td:nth-child(3)").html(response.data.time);
            } else {
              $('table tbody').prepend('<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.date+'</td><td>'+response.data.time+'</td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editGroup(event.target)" class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deleteGroup(event.target)">Delete</a></td></tr>');
            }
            $('#date').val('');
            $('#time').val('');

            $('#group-modal').modal('hide');
          }
          else{

          }
      },
      error: function(response) {
        console.log(response.responseJSON);
        console.log(response.data);
        $('#tbody').prepend('<tr id="row_'+response.data.group_id+'"><td>'+response.data.group_id+'</td><td>'+response.data.date+'</td><td>'+response.data.time+'</td><td><a href="javascript:void(0)" data-id="'+response.data.group_id+'" onclick="editGroup(event.target)" class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="'+response.data.group_id+'" class="btn btn-danger" onclick="deleteGroup(event.target)">Delete</a></td></tr>');

        console.log(response.responseJSON);
        console.log(response.responseText);
        $('#dateError').text(response.responseJSON.errors.date);
        $('#timeError').text(response.responseJSON.errors.time);
      }
    });
}
</script>
@endsection
