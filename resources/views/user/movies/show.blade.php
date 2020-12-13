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
                              <td>Listed In</td>
                              <td>{{ $movie->listed_in }}</td>
                            </tr>

                            <tr>
                              <td>Description</td>
                              <td>{{ $movie->description }}</td>
                            </tr>

                        </tbody>
                      </table>
                    <a href="{{ route('user.movies.index')}}" class="btn ">Back</a>

                  </br>
              </br>
              <h2>
                Reviews

                <a href="{{ route('user.reviews.create', $movie->id) }}" class="btn btn-primary ">Add</a>

              </h2>

              <ul>
                @if (count($movie->reviews) == 0)
                  <p>There are no reviews for this movie</p>
                @else
                  @foreach ($movie->reviews as $review)
                    <li>{{ $review->review }}</li>
                    <li>{{ $review->rating }}</li>
                  @endforeach
                @endif
              </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
