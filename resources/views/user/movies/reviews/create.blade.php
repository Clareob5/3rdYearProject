@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">

        <div class="col-md-4">
          <h2>{{ $movie->title }} ( {{ $movie->release_year }} )</h2>
            <img src="{{ asset('assets/img/' . $movie->cover ) }}" width="300px"/>
        </div>

          <div class="col-md-8 col-md-offset-2 topspace">
              <div class="card box_style">
                  <div class="card-header">
                  <h3>  Add a Review </h3>
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
                              <input type="text" class="form-control text-light" id="review" name="review" value="{{ old('review') }}" />
                          </div>

                          <div class="form-group">
                              <label for="rating">Rating</label>
                            <select class="form-control text-light" placeholder="Rate this movie out of 5" id="rating" name="rating" value="{{ old('rating') }}"  >
                              <option>Rate this movie out of 5</option>
                              <option>1.0</option>
                              <option>1.5</option>
                              <option>2.0</option>
                              <option>2.5</option>
                              <option>3.0</option>
                              <option>3.5</option>
                              <option>4.5</option>
                              <option>5.0</option>
                              <option>5.5</option>
                            </select>
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
