@extends('layouts.app')

@section('content')



{{-- <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Your Groups</h3>
        </div>

        <ul class="list-unstyled components">
            <p>View Groups and Members below</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>

    </nav> --}}
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="sidebar-header">
          <h3>Your Groups</h3>
      </div>

      <ul class="list-unstyled components">
          <p>View Groups below</p>
          <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Groups</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                @foreach ($groups as $group)
                @if($group->user_id == Auth::user()->id)
                    <li>
                      <p><a href="{{route('user.groups.show', $group->id)}}" class="text-light">{{ $group->group_name }}</a></p>
                    </li>
                    @endif
                    @endforeach
              </ul>
          </li>
          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Upcomong Events</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                @foreach ($groups as $group)
                @if($group->user_id == Auth::user()->id)
                  @foreach ($group->events as $event)
                    <li>
                      <h6>{{ $event->group->group_name}}</h6>
                      <p>{{ date('j F, Y', strtotime($event->date )) }}</p>
                    </li>
                  @endforeach
                    @endif
                    @endforeach
              </ul>
          </li>
          <li>
              <a href="{{ route('about') }}">About</a>
          </li>
          <li>
              <a href="{{ route('user.catalogue') }}">Catalogue</a>
          </li>
      </ul>
        <a href="{{ route('user.groups.create') }}" class="btn sidebar_btn btcolor btn-md">Create Group</a>
    </div>
    <!-- Use any element to open the sidenav -->
    <span onclick="openNav()"><i class="fas fa-align-left"></i></span>

    {{-- <!-- Page Content -->
    <!-- <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div>
        </nav>
    </div> --> --}}
</div>



<!-- end sidebar -->

<div class="container background-dark" id='main'>
    <div class="row justify-content-center">


        <div class="col-md-12">

            <div class="row justify-content-center   {{-- <div class="col-6">
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
                  </div> --}}
">
                <img src="/assets/img/coolbanner.png">

            </div>



            <div class="row justify-content-center topPadding">
                <h1 class="text-light">Welcome back {{ Auth::user()->name }}</h1>

            </div>

            <div class="row justify-content-center">
                <h4 class="text-light">This page will become more active as you add more movies to your watchlist</h4>


            </div>

            <div class="d-grid gap-2 col-4 mx-auto slightPush5">
                <a class="nav-link" href="{{ route('user.watchlist') }}"><button type="button" class="btn btcolor btn-md">GO TO WATCHLIST</button></a>
            </div>


        </div>




        <section class="topPadding">




    <h5 class="text-light push4">YOUR MOVIE RECOMMENDATIONS</h5>
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
                    </div>
                </div>
            </div>
            @endif
            @endfor
            @endforeach


        </div>
        </section>



        <section class="topPadding">

            <div class="row justify-content-center">
                <img src="/assets/img/midbanner.png">
            </div>
        </section>

        <section class="topPadding">




            <h5 class="push4">POPULAR ON ALPHA FILMS</h5>
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

        <section class="topPadding">
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

        <section class="topPadding">
          <h5 class="push4">TOP REVIEWS</h5>
            <div class="container-fluid">
                <div class="row">
                  @foreach ($reviews as $review)
                    <div class="col-6">
                        <div class="card mb-3 bgcardcolor" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ '../assets/img/' . $review->movie->cover }}" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $review->movie->title }}</h4>
                                        <h5 class="card-title">Top Review</h5>
                                        <p class="card-text">{{ $review->review}}</p>
                                        <p class="card-text"><small class="text-light">Rating: {{$review->rating}} out of 5</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                    </div>
                </div>
    </section>



    <section class="topPadding">


        <div class="card bgcardcolor text-white">

          <img class="card-img" src="https://cdn.dribbble.com/users/155265/screenshots/11082839/media/16ec3348bcf2895a6647263f0a5a002f.gif" height="400" width="400">

          <div class="card-img-overlay see_more2">
            <h1 class="card-title bold">VISIT OUR MOVIE CATALOGUE</h1>
            <h3 class="card-text bold slightPush2">View every movie available on the site!</h3>

            <div class="slightPush4">
              <a class="nav-link" href="{{ route('user.catalogue') }}"><button type="button" class="btn btn-warning btn-md">GO TO CATALOGUE</button></a>
            </div>
          </div>
        </div>

    </section>


    <section class="topPadding">




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

// trigger sidebar toggle

// $(document).ready(function () {

//     $("#sidebar").mCustomScrollbar({
//          theme: "minimal"
//     });
//
//     $('#sidebarCollapse').on('click', function () {
//         $('#sidebar').toggleClass('active');
//     });
//
// });

// $(document).ready(function () {

  function openNav() {
  document.getElementById("mySidenav").style.width = "15%";
  document.getElementById("main").style.marginLeft = "10%";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "61.667";
}

//     $("#sidebar").mCustomScrollbar({
//          theme: "minimal"
//     });
//
//     $('#sidebarCollapse').on('click', function () {
//         // open or close navbar
//         $('#sidebar').toggleClass('active');
//         // close dropdowns
//         $('.collapse.in').toggleClass('in');
//         // and also adjust aria-expanded attributes we use for the open/closed arrows
//         // in our CSS
//         $('a[aria-expanded=true]').attr('aria-expanded', 'false');
//     });
//
// });


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
                $('#add_to_wishlist_' + movie_id).html('<h6 class="heartColor"><i class="fas fa-heart"></i> Added </h6>');
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
