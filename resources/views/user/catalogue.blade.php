@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <div class="row justify-content-center">

            <div class="card bgcardcolor text-white">

              <img class="card-img" src="https://cdn.dribbble.com/users/783623/screenshots/14206317/media/79a10cfb6cc9dcf8f28aa64d8798d399.jpg?compress=1&resize=1400x400">

              <div class="card-img-overlay see_more">
                <h1 class="card-title bold slightPush">Movie Catalogue</h1>
                <h3 class="card-text bold">All movies available on Alpha Films, in one place!</h3>
                <h3 class="card-text bold slightPush2">Click on any movie to view more details</h3>
              </div>
            </div>

          </div>



  <br>
  <br>

                <div class="card-deck">
                    @if (count($movies) === 0)
                      <p>There are no movies</p>
                    @else

                          @foreach ($movies as $movie)
                            <div class="col-md-2 active topspace2">
                              <div class="card bgcardcolor">
                                <a href="{{ route('user.movies.show', $movie->id )}}" ><img class="card-img-top img-fluid" src="{{ 'assets/img/' . $movie->cover }}" height="300" alt="Card image cap"></a>
                                <div class="card-body card_padding">
                                  <h4 class="card-title title_size">{{ $movie->title }} ( {{ $movie->release_year }} )</h4>
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
