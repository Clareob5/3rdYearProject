@extends('layouts.app')

@section('content')
<div class="container-fluid background-dark">
    <div class="row justify-content-center">

      <div class="col-md-12">
        <h1 class="text-light">User Watchlist</h1>

      </div>

<!-- search bar component not working -->
      <!-- <div class="col-md-4">

        <livewire:search-watchlist />


      </div> -->



        </div>
        </div>



        <section>
          <br>
          <br>



  <div class="container-fluid">
      <div class="row">
        @foreach (Auth::user()->movies as $movie)
          <div class="col-6">
            <div class="card mb-3 bgcardcolor" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="{{ '../assets/img/' . $movie->cover }}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{ $movie->title }}</h5>
                      <p class="card-text">{{ $movie->description }}</p>
                        <div class="row justify-content-center">
                          <a href="{{ route('user.movies.show', $movie->id)  }}" type="button" class="btn btcolor">View More</a>
                        </div>
                        <h5 class="card-text topspace"><small class="text-light">GENRE: {{ $movie->genre }}</small></h5>
                        <h5 class="card-text"><small class="text-light">RATING: {{ $movie->rating }}</small></h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach



</div>

</div>
</div>
                  </section>

                  <section>
                    <br>
                    <div class="justify-content-center">
                        <a href="{{ route('user.home')}}" class="btn btcolor ">Back</a>
                    </div>
                  </section>







                    </div>
                </div>
            </div>
            </div>

    </div>
</div>
</div>
@endsection
