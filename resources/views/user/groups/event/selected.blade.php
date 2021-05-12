@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 box_style_four card">
        <div class="card-header text-light">
            Chosen Movie for event {{$event->group->group_name}}
        </div>
        <div class="card-body">
            <div class="col-md-6 active">
                <div class="card">
                    <a href="{{ route('user.movies.show', $movie->id) }}">
                        <img class="card-img-top img-top" src="{{ '/assets/img/' . $movie->cover }}" alt="Card image cap"></a>
                    <div class="bg-dark text-white">
                        <h6>{{ $movie->title }}<br>{{ $movie->release_year }}</h6>
                    </div>
                </div>
            </div>
          </div>
          <td class="text-light"><a href="{{ route('user.groups.show', $event->group_id) }}" class="btn btn-outline-light">Back</a>
      </div>
        </div>
    </div>
    @endsection
