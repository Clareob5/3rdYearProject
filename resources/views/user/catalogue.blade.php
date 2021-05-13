@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

<!-- aligning content in the center -->
          <div class="row justify-content-center">
<!-- creating a card image with text overlay, image from Dribbble -->
            <div class="card bgcardcolor text-white">

              <img class="card-img" src="https://cdn.dribbble.com/users/783623/screenshots/14206317/media/79a10cfb6cc9dcf8f28aa64d8798d399.jpg?compress=1&resize=1400x400">
<!-- text overlaying card -->
              <div class="card-img-overlay see_more">
                <h1 class="card-title bold slightPush">Movie Catalogue</h1>
                <h3 class="card-text bold">All movies available on Alpha Films, in one place!</h3>
                <h3 class="card-text bold slightPush2">Click on any movie to view more details</h3>
              </div>
            </div>

          </div>



<!-- card deck of images from database. using a foreach loop to display images and text -->
<!-- if there are no movies available then a small message will display instead -->
                <div class="card-deck topPadding">
                    @if (count($movies) === 0)
                      <p>There are no movies</p>
                    @else

                          @foreach ($movies as $movie)
                            <div class="col-md-2 active topspace2">
                              <div class="card bgcardcolor">
                                <a href="{{ route('user.movies.show', $movie->id )}}" ><img class="card-img-top img-fluid" src="{{ 'assets/img/' . $movie->cover }}" height="300" alt="Card image cap"></a>
                                <div class="card-body card_padding">
                                  <h4 class="card-title title_size">{{ $movie->title }} ( {{ $movie->release_year }} )</h4>
                                  <a href="javascript:void();" class="card-title add_to_wishlist light-link" data-quantity="1" data-id="{{ $movie->id }}" id="add_to_wishlist_{{$movie->id}}"><h6><i class="fas fa-heart"></i>Add to watchlist</h6></a>
                                </div>
                              </div>
                            </div>
                          @endforeach
                    @endif
                </div>

<!-- back button to return to homepage -->
                <div class="justify-content-center push3 topspace2">
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
                $('#add_to_wishlist_' + movie_id).html('<h6>Added to your Watchlist</h6>');
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
