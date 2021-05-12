@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="title col-md-3">
            <h3>Groups</h3>
            <div class="box_style_three card h-100">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @foreach ($groups as $group)
                            @if($group->user_id == Auth::user()->id)
                                <tr>
                                    <td><a href="{{route('user.groups.show', $group->id)}}" class="text-light">{{ $group->group_name }}</a></td>
                                </tr>
                                @endif
                                @endforeach
                                <tr>
                                    <td><a href="{{ route('user.groups.create') }}" class="btn light_button text-light">Create Group</a></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 title">
            <h3>Group Details</h3>
            <div class="card box_style_four h-100">
                <div class="card-header">
                    <h4 class="">Events for {{ $group->group_name}}</h4>
                </div>
                <div class="card-body center_text">

                    {{-- <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td class="text-light">Name:</td>
                                    <td class="text-light">{{ $group->group_name}}</td>
                    </tr>
                    <tr>
                        <td class="text-light">Admin:</td>
                        <td class="text-light">{{ $group->user->name }}</td>
                    </tr>
                    <tr>
                        <td>

                            </form>
                        </td>
                    </tr>
                    </tbody>
                    </table> --}}
                    @if (count($group->events) == 0)
                    <div class="card-body">
                        <h5 class="text-light">There are no events for this group.</h5>
                        <tr>
                            <td><a href="{{ route('user.home') }}" class="btn btn-default text-light">Back</a>
                                <a href="javascript:void(0)" class="btn create_btn" id="create-new-event" onclick="addEvent()">Create Event</a>
                                {{-- <a href="" class="btn btn-warning" data-id="{{ $group->id }}" onclick="editGroup(event.target)">Edit</a> --}}

                            </td>
                        </tr>
                    </div>
                    @else
                    <div class="card-body">
                        <table class="table text-light">
                            <thead>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Actions</th>
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
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="javascript:void(0)" class="btn btn-success" id="create-new-event" onclick="addEvent()">Add</a>

                    </div>
                    @endif

                </div>
            </div>
        </div>
          <div class="col-md-3 title">
              <h3>Members</h3>

              <div class="card box_style_three h-100">
                  <div class="card-body">
                      <p>Admin: {{ $group->user->name}}</p>

                      @foreach ($members as $member)

                      <p>{{ $member->name }}</p>

                      @endforeach


                      <a href="{{ route('user.groups.edit', $group->id) }}" class="btn light_button">Edit Group</a>
                      <form style="display:inline-block" method="POST" action="{{ route('user.groups.destroy', $group->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-danger">Delete Group</a>
                      </form>
                  </div>
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


{{-- <div class="modal-dialog">
    <div class="modal-content box_style">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
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
</div>
</div> --}}
