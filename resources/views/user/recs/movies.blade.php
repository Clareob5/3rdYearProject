@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h2 class="center_text"> Choose Movies</h2>
          <div class="card box_style_select center_text">

              <h4>Select Multiple Movies You Have Watched or Recognise <br> By clicking the Checkbox!</h4>

                <div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('user.recs.movies.update', Auth::user()->id ) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <fieldset class="center_text">
                          <div class="container-fluid">
                          <div class="row">
                          @foreach($movies as $movie)
                            <div class="spacingMovies checkbox-info checkbox-circle">
                                    <img  src="{{ '/assets/img/' . $movie->cover }}" width="200px" height='240px'/><br>
                                      <input type="checkbox" class="checkbox_large" name="movie_ids[]" value="{{ $movie->id }}">
                                      {{-- <p> {{ $movie->title }} ({{ $movie->release_year }}) </p> --}}
                                </div>
                          @endforeach

                        </div>
                      </div>
                            <br>
                            </fieldset>
                            <button type="submit" class="btn create_btn pull-right">Proceed</button>
                            <a href="{{ route('user.profile', Auth::user()->id)}}" class="btn pull-right">Skip</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
