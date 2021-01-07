@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

          <p id="alert-message" class"alert collapse"></p>

            <div class="card">
                <div class="card-header">
                  Movies
                </div>

                <div class="card-body">
                    @if (count($movies) === 0)
                      <p>There are no movies</p>
                    @else
                      <table id="table-movies" class="table table-hover">
                        <thead>
                          <th>Title</th>
                          <th>Director</th>
                          <th>Cast</th>
                          <th>Country</th>
                          <th>Date Added</th>
                          <th>Release Year</th>
                          <th>Rating</th>
                          <th>Duration</th>
                          <th>Listed In</th>
                          <th>Description</th>
                          <th>Actions</th>
                        </thead>
                        <tbody>
                          @foreach ($movies as $movie)
                            <tr data-id="{{ $movie->id }}">
                              <td>{{ $movie->title }}</td>
                              <td>{{ $movie->director }}</td>
                              <td>{{ $movie->cast }}</td>
                              <td>{{ $movie->country }}</td>
                              <td>{{ $movie->date_added }}</td>
                              <td>{{ $movie->release_year }}</td>
                              <td>{{ $movie->rating }}</td>
                              <td>{{ $movie->duration }}</td>
                              <td>{{ $movie->listed_in }}</td>
                              <td>{{ $movie->description }}</td>
                              <td>
                                <a href="{{ route('user.movies.show', $movie->id )}}" class="btn btn-primary">View</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
