@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">


            <section>
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-4">


                            <img src="{{ asset('assets/img/' . $movie->cover ) }}" width="300px"/>
                            <br>
                            <br>

                            <p>Rate</p>
                            <h1><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </h1>
                            <br>


                            <a href="#" target="_blank"><button type="button" class="btn btn-success"><i class="fas fa-play-circle"></i>Trailer</button></a>


                            <br>
                            <br>

                        </div>


                        <div class="col-4">


                            <h1>{{ $movie->title }}</h1>
                            <p>{{ $movie->release_year }}</p>

                            <p>{{ $movie->description }}</p>

                            <h4>Rating:</h4>
                            <p>{{ $movie->rating }}</p>


                            <h4>Duration:</h4>
                            <p>{{ $movie->duration }}</p>


                            <h4>Genre:</h4>
                            <p>{{ $movie->genre }}</p>


                            <h4>Director:</h4>
                            <p>{{ $movie->director }}</p>

                            <h4>Cast:</h4>
                            <p>{{ $movie->cast }}</p>


                            <h4>Country:</h4>
                            <p>{{ $movie->country }}</p>


                            <h4>Date Added:</h4>
                            <p>{{ $movie->date_added }}</p>



                        </div>

                        <div class="col-4">
                            <p>Add to Watchlist</p>
                            <h1><i class="fas fa-heart"></i></h1>




                        </div>

                    </div>
                </div>
            </section>


            <br>
            <br>

            <h2>
                Reviews

                <a href="{{ route('user.reviews.create', $movie->id) }}" class="btn btn-primary ">Add</a>

            </h2>

            <div class="card-deck">
              @if (count($movie->reviews) == 0)
              <p>There are no reviews for this movie</p>
              @else
              @foreach ($movie->reviews as $review)
  <div class="card box_style_two">
    <div class="card-body">


      <h5 class="card-title">Reviews</h5>
      <p class="card-text">{{ $review->review }}</p>

      <h5>Rating</h5>
      <p class="card-text">{{ $review->rating }}</p>



    </div>
  </div>



  @endforeach
  @endif
</div>

<br>

<div class="justify-content-center">
    <a href="{{ route('user.home')}}" class="btn btcolor ">Back</a>
</div>



        </div>
    </div>
</div>
@endsection
