@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-2 box_style_two card">
          <h3>Groups</h3>
          <div class="card-body">
            <p>Group name<p>
        </div>
      </div>

          <div class="col-md-8 ">
            <div class="card box_style_two">
                <div class="card-header text-light">
                  Event Details
                </div>

                <div class="card-body ">
                      <table class="table table-hover text-light">
                        <tbody>
                            <tr>
                              <td>Date</td>
                              <td>{{ $event->date }}</td>
                            </tr>

                            <tr>
                              <td>Time</td>
                              <td>{{ $event->time }}</td>
                            </tr>

                      <tr>
                      <td class="text-light"><a href="{{ route('user.groups.show', $event->group_id) }}" class="btn btn-outline-light">Back</a>
                      <a href="{{ route('user.groups.event.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                      <form style="display:inline-block" method="POST" action="{{ route('user.groups.event.destroy', $event->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-danger">Delete</a>
                      </form>
                    </td>
                    </tr>
                    </tbody>
                    </table>

                </div>
                <div class="card-header text-light">
                  Chosen Movie for event
                </div>
                <div class="card-body">  @foreach ($movies as $movie)
                    @if ($movie->id == $final_mov[0]['id']) <div class="col-md-6 active">
                      <div class="card">
                          <a href="{{ route('user.movies.show', $movie->id) }}">
                              <img class="card-img-top img-top" src="{{ '/assets/img/' . $movie->cover }}" height="240" alt="Card image cap"></a>
                          <div class="card-img-overlay">
                              <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                          </div>
                          <div class="bg-dark text-white">
                              <h6>{{ $movie->title }}<br>{{ $movie->release_year }}</h6>
                              <div>
                                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endif
                  @endforeach</div>
            </div>
      </div>
      <div class="col-md-2 box_style_two card">
        <div class="card-body">
          <h3>Members</h3>
          <p>user 1</p>

      </div>
  </div>
</div>
</div>
@endsection
