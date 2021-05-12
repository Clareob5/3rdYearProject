@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card box_style">
                <h2 class="center_text"> Choose Movies</h2>

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
                        <fieldset>
                          <div class="container-fluid">
                          <div class="row">
                          @foreach($movies as $movie)
                            <div style="margin-bottom: 10px;">
                              <input type="checkbox" name="movie_ids[]" value="{{ $movie->id }}"><img src="{{ '/assets/img/' . $movie->cover }}" width="120px" height='120px'/><br>
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
