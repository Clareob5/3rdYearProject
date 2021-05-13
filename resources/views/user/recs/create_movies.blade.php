@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card box_style">
                <h2 class="center_text"> Choose Movies</h2>

                <h4>Select Multiple Movies You Have Watched or Recognise!</h4>

                <div class="topspace">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('user.recs.create_movies.store', Auth::user()->id ) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                          <div class="container-fluid">
                          <div class="row">
                          @foreach($movies as $movie)
                            <div class="spacingMovies">
                              <input type="checkbox" name="movie_ids[]" value="{{ $movie->id }}">

                              <img  src="{{ '/assets/img/' . $movie->cover }}" width="200px" height='240px'/><br>

                              <p> {{ $movie->title }} {{ $movie->release_year }} </p>
                            </div>

                          @endforeach

                        </div>
                      </div>
                            <br>
                            </fieldset>
                            <button type="submit" class="btn btn-primary pull-right">Next</button>
                            <a href="{{ route('user.profile', Auth::user()->id)}}" class="btn pull-right">Skip</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
