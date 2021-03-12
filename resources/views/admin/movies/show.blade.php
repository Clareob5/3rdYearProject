@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  Movie {{ $movie->title }}
                </div>

                <div class="card-body">
                      <table class="table table-hover">
                        <tbody>

                          <tr>
                              <td rowspan="6">
                              <img src="{{ asset('storage/covers/' . $movie->cover ) }}" width="150" />
                              </td>
                          </tr>

                            <tr>
                              <td>Title</td>
                              <td>{{ $movie->title }}</td>
                            </tr>

                            <tr>
                              <td>Director</td>
                              <td>{{ $movie->director }}</td>
                            </tr>

                            <tr>
                              <td>Cast</td>
                              <td>{{ $movie->cast }}</td>
                            </tr>

                            <tr>
                              <td>Country</td>
                              <td>{{ $movie->country }}</td>
                            </tr>

                            <tr>
                              <td>Date Added</td>
                              <td>{{ $movie->date_added }}</td>
                            </tr>

                            <tr>
                              <td>Release Year</td>
                              <td>{{ $movie->release_year }}</td>
                            </tr>

                            <tr>
                              <td>Rating</td>
                              <td>{{ $movie->rating }}</td>
                            </tr>

                            <tr>
                              <td>Duration</td>
                              <td>{{ $movie->duration }}</td>
                            </tr>

                            <tr>
                              <td>Genre</td>
                              <td>{{ $movie->genre }}</td>
                            </tr>

                            <tr>
                              <td>Description</td>
                              <td>{{ $movie->description }}</td>
                            </tr>

                        </tbody>
                      </table>


                      <a href="{{ route('admin.movies.index') }}" class="btn btn-default">Back</a>
                      <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
                      <form style="display:inline-block" method="POST" action="{{ route('admin.movies.destroy', $movie->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="form-control btn btn-danger">Delete</a>
                      </form>


                </div>
            </div>

            <div class="card">
        <div class="card-header">
          Reviews
        </div>
        <div class="card-body">
          @if (count($movie->reviews) == 0)
          <p>There are no reviews for this movie.</p>
          @else
          <table class="table">
              <thead>
                  <th>Review</th>
                  <th>Rating</th>
                  <th>Actions</th>
              </thead>
              <tbody>
                  @foreach ($movie->reviews as $review)
                  <tr>
                      <th>{{ $review->review }}</th>
                      <th>{{ $review->rating }}</th>
                      <th>
                          <form style="display:inline-block" method="POST" action="{{ route('admin.reviews.destroy', [ 'id' => $movie->id, 'rid' => $review->id]) }}">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="form-control btn btn-danger">Delete</a>
                          </form>
                      </th>
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
