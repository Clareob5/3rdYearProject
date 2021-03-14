@extends('layouts.app')

@section('content')
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

        <br>
        <br>


        <section>

    </div>

    <p class="text-light">YOUR MOVIE RECOMMENDATIONS</p>
    <div class="row">
        <div class="card-group">
            @foreach ($movies as $movie)
            @for ($i=0; $i < 6; $i++)
              @if ($movie->id == $recomms[$i]['id']) <div class="col-md-2 active">
                <div class="card">
                    <a href="{{ route('user.movies.show', $movie->id) }}">
                        <img class="card-img-top img-top" src="{{ '../assets/img/' . $movie->cover }}" height="240" alt="Card image cap"></a>
                    <div class="card-img-overlay">
                        <a href="javascript:void();" class="card-title add_to_wishlist light-link" data-quantity="1" data-id="{{ $movie->id }}" id="add_to_wishlist_{{$movie->id}}"><h3><i class="fas fa-heart"></i></h3></a>
                    </div>
                    <div class=" card body bgcardcolor text-white">
                        <h6>{{ $movie->title }}</h6>
                        <p>{{ $movie->release_year }}</p>
                        {{-- <div>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                        </div> --}}
                        <div class="col-12">
                          <a href="{{ route('user.movies.show', $movie->id)  }}" type="button" class="btn btn-outline-light"><h6>Read more</h6></a>
                        </div>
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
            <div class="row justify-content-center push2">
                <img src="/assets/img/midbanner.png">

            </div>
        </section>

        <section>
            <br>
            <br>

            <p class="text-light">POPULAR ON ALPHA FILMS</p>
            <div class="row">
                <div class="card-group">
                  @foreach ($pop_movies as $movie)
                      <div class="col-md-2 active">
                          <div class="card">
                              <img class="card-img-top img-top" src="{{ '../assets/img/' . $movie->cover }}" height="240" alt="Card image cap">
                              <div class="card-img-overlay">
                                  <a href="javascript:void();" class="card-title add_to_wishlist light-link" data-quantity="1" data-id="{{ $movie->id }}" id="add_to_wishlist_{{$movie->id}}"><h3><i class="fas fa-heart"></i></h3></a>
                              </div>
                              <div class="bgcardcolor text-white">
                              <h6>{{ $movie->title }}</h6><p>{{ $movie->release_year }}</p>
                              <div class="col-12">
                                <a href="{{ route('user.movies.show', $movie->id)  }}" type="button" class="btn btcolor mt-3"><h6>Read more</h6></a>
                              </div>
                          </div>

                          </div>
                      </div>
                    @endforeach
                </div>
        </section>


        <section>
            <br>
            <br>

            <p>LATEST NEWS</p>

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
                <p>POPULAR REVIEWS</p>
            </section>

        </section>

        <section>


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
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-light">Last updated 3 mins ago</small></p>
                                    </div>
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

        <p>POPULAR LISTS</p>

        <div class="container-fluid">
            <div class="row">

                <div class="col-4">
                    <img src="/assets/img/poplist1.png">
                    <p><i class="fas fa-heart"></i>Candy Cinema</p>
                    <P>1,089,678 likes</p>
                </div>

                <div class="col-4">
                    <img src="/assets/img/poplist2.png">
                    <p><i class="fas fa-heart"></i>Movies for boredom</p>
                    <P>635,467 likes</p>
                </div>

                <div class="col-4">
                    <img src="/assets/img/poplist3.png">
                    <p><i class="fas fa-heart"></i>The greatest list on Earth</p>
                    <P>483,795 likes</p>
                </div>

            </div>
        </div>

    </section>


    <section>

        <br>
        <br>

        <p>RECENT SHOWDOWNS</p>

        <div class="card-deck">
            <div class="card-group">
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

        </div>
    </section>




    <section>
        <br>
        <br>

        <p>RECENT NEWS</p>

        <div class="card-group">

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



    </section>


</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
@endsection

@section('javascript')
<script>
  $(document).on('click','.add_to_wishlist',function(e){
    e.preventDefault();
    var movie_id=$(this).data('id');
    var movie_qty=$(this).data('quantity');
    console.log(movie_id);

    var token="{{csrf_token()}}";
    var path="{{route('user.watchlist.store')}}";

    $.ajax({
      url:path,
      type:"POST",
      dataType:"JSON",
      data:{
        movie_id:movie_id,
        movie_qty:movie_qty,
        _token:token,
      },
      beforeSend:function () {
        $('#add_to_wishlist_'+movie_id).html('<i class="fas fa-heart"></i>');
      },
      complete:function () {
        $('#add_to_wishlist_'+movie_id);
      },
      success:function (data) {
        console.log(data);

        if(data['status']){
          $('body #header-ajax').html(data['header']);
          $('body #cart_counter').html(data['cart_count']);
          swal({
            title: "Good job!",
            text: data['message'],
          })
        }
      }
    })
  })
</script>
@endsection
