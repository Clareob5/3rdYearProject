@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 card box_style_two">
          <div class="card-header">
            Groups
          </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <td>{{ $group->group_name }}</td>
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
                              <td>Name</td>
                              <td>{{ $group->group_name}}<td>

                          </tr>
                            <tr>
                                <td>Admin</td>
                                <td>{{ $group->user->name }}</td>
                            </tr>

                            <div class="card-body">
                                @if (count($group->events) == 0)
                                <p>There are no events for this group.</p>
                                @else
                                <table class="table">
                                    <thead>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($group->events as $event)
                                        <tr>
                                            <td>{{ $event->date }}</td>
                                            <td>{{ $event->time }}</td>
                                            <td><form style="display:inline-block" method="POST" action="{{ route('user.groups.event.destroy', $event->id) }}">
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
                                    <td><a href="{{ route('user.home') }}" class="btn btn-default">Back</a>
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
                <p>Ben Teck</p>

                <a href="" class="btn btn-warning">Edit</a>
                <div>
                    <form style="display:inline-block" method="POST" action=""> {{-- {{ route('user.group.destroy') }} --}}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="group-modal" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
          <!-- <form method="POST" action="{{ route('user.groups.event.store', $group->id) }}"> -->
          <form method="POST" action="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="group_id" value="{{ $group->id }}">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" />
                      <span id="dateError" class="alert-message"></span>
                  </div>

              <div class="form-group">
                  <label for="time">Time</label>
                       <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}" />
                      <span id="timeError" class="alert-message"></span>
                  </div>

          </form>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="createEvent()">Save</button>
      </div>
  </div>
</div>
</div>
@endsection

@section('javascript')
<script>
function createEvent() {
    console.log("Checking create event")
  var date = $('#date').val();
  var time = $('#time').val();
  var id = $('#group_id').val();

  let _url     = `event/store`;
  let _token   = $('meta[name="csrf_token"]').attr('content');

    $.ajax({
      url: _url,
      type: "POST",
      data: {
        id: id,
        date: date,
        time: time,
        _token: _token
      },
      success: function(response) {
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
      },
      error: function(response) {
        $('#dateError').text(response.responseJSON.errors.date);
        $('#timeError').text(response.responseJSON.errors.time);
      }
    });
}
</script>
@endsection
