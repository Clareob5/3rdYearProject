@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Chosen Movie for event {{$event->group->group_name}}</h2>
    </div>
    <div class="card-group">
        <div class="box_style_four card col-md-6">
            <a href="{{ route('user.movies.show', $movie->id) }}">
                <img class="card-img-top img-top selected_img" src="{{ '/assets/img/' . $movie->cover }}" alt="Card image cap" style="max-height: 700px"></a>
        </div>
        <div class="box_style_four card">
            <div class="card-body">
                <h2 class="card-title">{{ $movie->title }}</h2>
                <p class="card-text">{{ $movie->description }}</p>
                <h5 class="card-text topspace"><small class="text-light">GENRE: {{ $movie->genre }}</small></h5>
                <h5 class="card-text"><small class="text-light">RATING: {{ $movie->rating }}</small></h5>
                <div class="justify-content-center center_text">
                    <div class="text-light card-title padding" ><a href="{{ route('user.groups.show', $event->group_id) }}" class="btn btn-outline-light">Back to Groups</a>
                        <a href="{{ route('user.watchlist', Auth::user()->id) }}" class="btn create_btn margin">View Watchlist</a>
                        <a href="{{ route('user.home', Auth::user()->id) }}" class="btn btn-outline-success">Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
