@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Choose Movies</div>

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

                    <form method="POST" action="{{ route('user.recs.movies.store', Auth::user()->id ) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                          @foreach($movies as $movie)
                            <input type="checkbox" name="movie_ids[]" value="{{ $movie->id }}">{{ $movie->title }}<br>
                          @endforeach
                            <br>
                            <button type="submit" class="btn btn-primary pull-right">Next</button>
                            <a href="{{ route('profile_show.show')}}" class="btn pull-right">Skip</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection