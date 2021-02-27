@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card box_style">
                <h2 class="center_text"> Choose Movies</h2>

                <div class="card-body">
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
                          @foreach($movies as $movie)
                            <input type="checkbox" name="movie_ids[]" value="{{ $movie->id }}">{{ $movie->title }}<br>
                          @endforeach
                            <br>
                            <button type="submit" class="btn btn-primary pull-right">Next</button>
                            <a href="{{ route('profile_show.show', Auth::user()->id)}}" class="btn pull-right">Skip</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
