@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

          <p id="alert-message" class="alert collapse"></p>

            <div class="card">
                <div class="card-header">
                  Movies
                  <a href="{{ route('admin.movies.create')}}" class="btn btn-primary float-right">Add</a>
                </div>

                <div class="card-body">
                    @if (count($movies) === 0)
                      <p>There are no movies</p>
                    @else
                      <table id="table-movies" class="table table-hover">
                        <thead>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Genre</th>
                          <th>Director</th>
                          <th>Actor</th>
                          <th>Release Date</th>
                          <th>Actions</th>
                        </thead>
                        <tbody>
                          @foreach ($movies as $movie)
                            <tr data-id="{{ $movie->id }}">
                              <td>{{ $movie->title }}</td>
                              <td>{{ $movie->description }}</td>
                              <td>{{ $movie->genre }}</td>
                              <td>{{ $movie->director }}</td>
                              <td>{{ $movie->actor }}</td>
                              <td>{{ $movie->release_date }}</td>
                              <td>
                                <a href="{{ route('admin.movies.show', $movie->id )}}" class="btn btn-primary">View</a>
                                <a href="{{ route('admin.movies.edit', $movie->id )}}" class="btn btn-warning">Edit</a>
                                <form style="display:inline-block" method="POST" action="{{ route('admin.movies.destroy', $movie->id) }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="form-control btn btn-danger">Delete</button>
                                </form>
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
