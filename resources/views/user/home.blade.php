@extends('layouts.app')

@section('content')

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div>
        </nav> -->

<!-- <div class="wrapper">

<nav id="sidebar">

  <ul class="list-unstyled commponents">


  <div class="sidebar-header">
    <h3>Your Groups</h3>
  </div>

  <li>
    @foreach ($groups as $group)

    @if($group->user_id == Auth::user()->id)

        <a class="text-light">{{ $group->group_name }}</a>

        @endif

    @endforeach
  </li>

</ul>
</nav>
</div> -->

<div class="container background-dark">
    <div class="row justify-content-center">


        <div class="col-md-12">

            <div class="row justify-content-center">
                <img src="/assets/img/coolbanner.png">

            </div>

            <br>
            <br>

            <div class="row justify-content-center">
                <h4 class="text-light">Welcome back {{ Auth::user()->name }}</h4>

            </div>

            <div class="row justify-content-center">
                <p class="text-light">This page will become more active as you add more movies to your watchlist</p>


            </div>


        </div>




        <section>
          <br>
          <br>



    <h5 class="text-light">YOUR MOVIE RECOMMENDATIONS</h5>
        <div class="card-group">
            @foreach ($movies as $movie)
            @for ($i=0; $i < 6; $i++)
              @if ($movie->id == $recomms[$i]['id']) <div class="col-md-2 active">
                <div class="card bgcardcolor">
                    <a href="{{ route('user.movies.show', $movie->id) }}">
                        <img class="card-img-top img-top" src="{{ '../assets/img/' . $movie->cover }}" alt="Card image cap" height="240"></a>

                        <div class="bgcardcolor text-white push2 topspace">
                        <p class="card-text">{{ $movie->title }} ({{ $movie->release_year }})</p>
                        <hr>
                       <a href="javascript:void();" class="card-title add_to_wishlist light-link" data-quantity="1" data-id="{{ $movie->id }}" id="add_to_wishlist_{{$movie->id}}"><h6><i class="fas fa-heart"></i> Add to Watchlist </h6></a>

{{--
            @for ($i=0; $i< 6; $i++)
              @if ($movie->id == $recomms[$i]['id'])
                <div class="col-md-2 active">
                <div class="card">
                    <a href="{{ route('user.movies.show', $movie->id) }}">
                        <img class="card-img-top img-top" src="{{ '/assets/img/' . $movie->cover }}" height="240" alt="Card image cap"></a>
                    <div class="card-img-overlay">
                        <a href="javascript:void();" class="card-title add_to_wishlist light-link" data-quantity="1" data-id="{{ $movie->id }}" id="add_to_wishlist_{{$movie->id}}">
                            <h3><i class="fas fa-heart"></i></h3>
                        </a>
                    </div>
                    <div class=" card body bgcardcolor text-white">
                        <h6>{{ $movie->title }}</h6>
                        <p>{{ $movie->release_year }}</p>
                        {{-- <div>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                        </div> -
                        <div class="col-12">
                            <a href="{{ route('user.movies.show', $movie->id)  }}" type="button" class="btn btn-outline-light">
                                <h6>Read more</h6>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endif
            @endfor
            @endforeach


        </div>
        </section>

        <br>
        <br>

        <section>
            <br>
            <br>
            <div class="row justify-content-center">
                <img src="/assets/img/midbanner.png">
            </div>
        </section>

        <section class="sectionSpacing">

          <br>
          <br>


            <h5>POPULAR ON ALPHA FILMS</h5>
                <div class="card-group">
                  @foreach ($pop_movies as $movie)
                      <div class="col-md-2 active">
                          <div class="card bgcardcolor">
                              <a href="{{ route('user.movies.show', $movie->id) }}">
                              <img class="card-img-top img-top" src="{{ '../assets/img/' . $movie->cover }}" height="240" alt="Card image cap"></a>

                              <div class="  bgcardcolor text-white push2 topspace">
                              <p class="card-text">{{ $movie->title }} ({{ $movie->release_year }})</p>
                              <hr class="white">
                             <a href="javascript:void();" class="card-title add_to_wishlist light-link" data-quantity="1" data-id="{{ $movie->id }}" id="add_to_wishlist_{{$movie->id}}"><h6><i class="fas fa-heart"></i> Add to Watchlist </h6></a>

                          </div>

                          </div>
                      </div>
                    @endforeach
                </div>



        </section>

        <section>
            <br>
            <br>

            <h5>LATEST NEWS</h5>

            <div class="card mb-3 bgcardcolor" style="max-width: 1140px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/assets/img/rose.png" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Rose Glass, Darkly</h5>
                            <p class="card-text">The writer-director of long-awaited A24 horror Saint Maud tells us about finding comfort in psychological thrillers, being terrified of gremlins, and drawing from Joan of Arc’s story for her
                                expressive,
                                bold debut.</p>
                            <p class="card-text"><small>READ MORE</small></p>
                        </div>
                    </div>
                </div>
            </div>





        <section>

          <br>
          <br>

          <h5>POPULAR REVIEWS</h5>

            <div class="container-fluid">
                <div class="row">


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
                                        <p class="card-text"><small class="text-light">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 bgcardcolor" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ '../assets/img/' . $movie->cover }}" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $movie->title }}</h5>
                                        <p class="card-text">{{ $movie->description }}</p>
                                        <p class="card-text"><small class="text-light">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                        <p class="card-text"><small class="text-light">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 bgcardcolor" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ '../assets/img/' . $movie->cover }}" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $movie->title }}</h5>
                                        <p class="card-text">{{ $movie->description }}</p>
                                        <p class="card-text"><small class="text-light">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

    </section>



    <section>

        <br>
        <br>

        <h5>RECENT SHOWDOWNS</h5>

        <div class="card-deck">
                <div class="card text-white bgcardcolor mb-3">
                    <img src="/assets/img/modest.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Modest Heroes</h5>
                        <p>Best Indie animated films</p>
                    </div>
                </div>
                <div class="card text-white bgcardcolor mb-3">
                    <img src="/assets/img/spirited.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Spirited Away</h5>
                        <p>Best ASMR films</p>
                    </div>
                </div>
                <div class="card text-white bgcardcolor mb-3">
                    <img src="/assets/img/unforgiven.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Unforgiven</h5>
                        <p>Best revenge films</p>
                    </div>
                </div>
                <div class="card text-white bgcardcolor mb-3">
                    <img src="/assets/img/sundance.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Sundance</h5>
                        <p>Best upcoming films</p>
                    </div>
                </div>


        </div>
    </section>
    <section>
        <br>
        <br>



        <div class="containe-fluid">

        <div class="row">

            <h5>RECENT NEWS</h5>

        <div class="card-deck">

            <div class="card text-white bgcardcolor mb-3">
                <img src="/assets/img/chame.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Chameleon</h5>
                    <p class="card-text">We talk to genre-bending J-horror auteur Kiyoshi Kurosawa about his new film.</p>
                </div>
                <div class="card-footer">
                    <small class="text-light">Last updated 2 hours ago</small>
                </div>
            </div>
            <div class="card text-white bgcardcolor mb-3">
                <img src="/assets/img/jason.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Life in Film: Jason Isaacs</h5>
                    <p class="card-text">We chat to cinema’s favorite baddie about lockdown film selections and more.</p>
                </div>
                <div class="card-footer">
                    <small class="text-light">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card text-white bgcardcolor mb-3">
                <img src="/assets/img/deepend.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Deep End</h5>
                    <p class="card-text">We talk with the filmmakers behind heart-shattering Netflix hit Pieces of a Woman.</p>
                </div>
                <div class="card-footer">
                    <small class="text-light">Last updated 1 hour ago</small>
                </div>
            </div>
        </div>

</div>
</div>


</section>


</div>
</div>
@endsection

@section('javascript')
<script>

$(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });

        $(document).ready(function () {

    $("#sidebar").mCustomScrollbar({
         theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});

$(document).ready(function () {

    $("#sidebar").mCustomScrollbar({
         theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        // open or close navbar
        $('#sidebar').toggleClass('active');
        // close dropdowns
        $('.collapse.in').toggleClass('in');
        // and also adjust aria-expanded attributes we use for the open/closed arrows
        // in our CSS
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

});

  //
  // $(document).on('click','.add_to_wishlist',function(e){
  //   e.preventDefault();
  //   var movie_id=$(this).data('id');
  //   var movie_qty=$(this).data('quantity');
  //   console.log(movie_id);
  //
  //   var token="{{csrf_token()}}";
  //   var path="{{route('user.watchlist.store')}}";
  //
  //   $.ajax({
  //     url:path,
  //     type:"POST",
  //     dataType:"JSON",
  //     data:{
  //       movie_id:movie_id,
  //       movie_qty:movie_qty,
  //       _token:token,
  //     },
  //     beforeSend:function () {
  //       $('#add_to_wishlist_'+movie_id).html('<i class="fas fa-heart"></i>');
  //     },
  //     complete:function () {
  //       $('#add_to_wishlist_'+movie_id);
  //     },
  //     success:function (data) {
  //       console.log(data);
  //
  //       if(data['status']){
  //         $('body #header-ajax').html(data['header']);
  //         $('body #cart_counter').html(data['cart_count']);
  //         swal({
  //           title: "Good job!",
  //           text: data['message'],
  //         })
  //       }
  //     }
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
