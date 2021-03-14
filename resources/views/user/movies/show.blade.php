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


                            <h4>Director:</h4>
                            <p>{{ $movie->director }}</p>



                            <h4>Cast:</h4>
                            <p>{{ $movie->cast }}</p>


                            <h4>Country:</h4>
                            <p>{{ $movie->country }}</p>


                            <h4>Date Added:</h4>
                            <p>{{ $movie->date_added }}</p>

                            <a href="https://www.youtube.com/watch?v=_eOI3AamSm8" target="_blank"><button type="button" class="btn btn-success"><i class="fas fa-play-circle"></i>Trailer</button></a>
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


                            <h4>Listed In:</h4>
                            <p>{{ $movie->genre }}</p>



                        </div>

                        <div class="col-4">
                            <p>Add to Watchlist</p>
                            <h1><i class="fas fa-heart"></i></h1>

                            <p>Rate</p>
                            <h1><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </h1>

                            <p>Similar Movies</p>
                            <img src="/assets/img/poplist1.png">

                        </div>

                    </div>
                </div>
            </section>



            <div class="justify-content-center">
                <a href="{{ route('user.home')}}" class="btn btn-danger ">Back</a>
            </div>

            <br>
            <br>

            <h2>
                Reviews

                <a href="{{ route('user.reviews.create', $movie->id) }}" class="btn btn-primary ">Add</a>

            </h2>


            <ul>
                @if (count($movie->reviews) == 0)
                <p>There are no reviews for this movie</p>
                @else
                @foreach ($movie->reviews as $review)
                <li>{{ $review->review }}</li>
                <li>{{ $review->rating }}</li>
                @endforeach
                @endif
            </ul>


        </div>
    </div>
</div>
@endsection
