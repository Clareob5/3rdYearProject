@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

                <div class="card-header">
                  Movies
                </div>

                <livewire:search-watchlist />
                



                <div class="card-group">
                    @if (count($movies) === 0)
                      <p>There are no movies</p>
                    @else

                          @foreach ($movies as $movie)
                            <div class="col-md-2 active">
                              <div class="card my_card">
                                <a href="{{ route('user.movies.show', $movie->id )}}" ><img class="card-img-top img-fluid" src="{{ 'assets/img/' . $movie->cover }}" height="300" alt="Card image cap"></a>
                                <div class="card-body card_padding">
                                  <h4 class="card-title title_size">{{ $movie->title }}</h4>
                                </div>
                              </div>
                            </div>
                          @endforeach
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection
