@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="card">
                  <div class="card-header">
                    {{ $movie->title }}: Add a Review
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
                      <form method="POST" action="{{ route('user.reviews.store', $movie->id) }}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                              <label for="review">Review</label>
                              <input type="text" class="form-control" id="review" name="review" value="{{ old('review') }}" />
                          </div>
                          <div class="form-group">
                              <label for="rating">Rating</label>
                              <input type="text" class="form-control" id="rating" name="rating" value="{{ old('rating') }}" />
                          </div>
                          <a href="{{ route('user.movies.show', $movie->id) }}" class="btn btn-default">Cancel</a>
                          <button type="submit" class="btn btn-primary pull-right">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
