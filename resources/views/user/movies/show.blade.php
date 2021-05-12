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
                            <a href="javascript:void();" class="card-title add_to_wishlist light-link" data-quantity="1" data-id="{{ $movie->id }}" id="add_to_wishlist_{{$movie->id}}"><h1><i class="fas fa-heart"></i> </h1></a>

                        </div>

                    </div>
                </div>
            </section>


            <br>
            <br>

            <h2>
                Reviews

                <a href="{{ route('user.reviews.create', $movie->id) }}" class="btn btn-primary">Add</a>

            </h2>

            <div class="card-deck topspace">
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
    <a href="{{ route('user.home')}}" class="btn btcolor">Back</a>
</div>



        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>

    $(document).on('click', '.add_to_wishlist', function(e) {
        e.preventDefault();
        var movie_id = $(this).data('id');
        var movie_qty = $(this).data('quantity');
        console.log(movie_id);

        var token = "{{csrf_token()}}";
        var path = "{{route('user.watchlist.store')}}";

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                movie_id: movie_id,
                movie_qty: movie_qty,
                _token: token,
            },
            beforeSend: function() {
                $('#add_to_wishlist_' + movie_id).html('<i class="fas fa-heart"></i>');
            },
            complete: function() {
                $('#add_to_wishlist_' + movie_id);
            },
            success: function(data) {
                console.log(data);
                console.log('I work');

                if (data['status']) {
                    $('body #header-ajax').html(data['header']);
                    swal({
                        title: "Movie Added",
                        text: data['message'],
                        icon: "success",
                        button: "OK!"
                    })
                } else if (data['present']) {
                    swal({
                        title: "Warning",
                        text: data['message'],
                        icon: "warning",
                        button: "OK!"
                    })
                } else {
                    swal({
                        title: "Sorry!",
                        text: "you can't add that",
                        icon: "error",
                        button: "OK!"
                    })
                }
            }
        })
    })
</script>
@endsection
