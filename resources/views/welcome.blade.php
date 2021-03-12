@extends('layouts.app')

@section('content')
<div class="container background-dark">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card header">
                <img src="assets/img/bigguestbanner.png" class="img-fluid" alt="...">

            </div>

            <div class="row justify-content-center">
            <div class="d-grid gap-2 col-2 mx-auto">
              <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-success btn-lg">JOIN NOW</button></a>

            </div>
            </div>

            <br>
            <br>

            <div class="row justify-content-center">
              <h4 class="text-muted">The social network for film lovers. Also available on ...</h4>

            </div>
            </div>

            <br>
            <br>


            <section>
              <br>
              <br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                      <h3>Popular Movies</h3>
                    </div>
                    <div class="row">
                      <div class="card-group">
                            <div class="col-md-2 active">
                                <div class="card">
                                    <img class="card-img-top img-top" src="assets/img/promising.jpg" height="240" alt="Card image cap">
                                    <div class="bgcardcolor text-white">
                                    <h6>Promising Young Woman (2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>

                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="card">
                                    <img class="card-img-top img-top" src="assets/img/shadow.png" alt="Card image cap">
                                    <div class="bgcardcolor text-white">
                                    <h6>Shadow in the Cloud (2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>

                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="card">
                                    <img class="card-img-top img-top" src="assets/img/onenight.jpg" height="240" alt="Card image cap">
                                    <div class="bgcardcolor text-white">
                                    <h6>One Night in Miamii (2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img class="card-img-top img-top" src="assets/img/pieces.jpg" alt="Card image cap">
                                    <div class="bgcardcolor text-white">
                                    <h6>Pieces of a Woman (2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img class="card-img-top img-top" src="assets/img/soul.jpeg" alt="Card image cap">
                                    <div class="bgcardcolor text-white">
                                    <h6>Soul <br>(2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                  </div>
                                </div>


                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img class="card-img-top img-top" src="assets/img/wolfwalkers.jpg" alt="Card image cap">
                                    <div class="bgcardcolor text-white">
                                    <h6>Wolfwalkers <br>(2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>

                                </div>
                                </div>
                            </div>
                      </section>



                      <section>
                        <br>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div>
                                <img src="assets/img/smallbanner.png" class="img-fluid" alt="...">

                            </div>

                      </section>



                      <section>
                        <br>
                        <br>
                        <br>

                        <p class="text-light">ALPHA FILMS LETS YOU....</p>

                        <div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card text-white bgcardcolor mb-3">
      <div class="card-body">
        <h5 class="card-title">
         </i>Keep track of every film you've ever watched(or just start from the day you join)</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card text-white bgcardcolor mb-3">
      <div class="card-body">
        <h5 class="card-title">Show some love for you favourite films, lists and reviews with a "like"</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card text-white bgcardcolor mb-3">
      <div class="card-body">
        <h5 class="card-title">Write and share reveiws, and read other members reviews. And also rate each film on a five star scale</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card text-white bgcardcolor mb-3">
      <div class="card-body">
        <h5 class="card-title">Create groups to add your friends to where you can choose films together! Have a group watchlist which everyone can add to</h5>
      </div>
    </div>
  </div>
</div>
                      </section>


                      <section>

                        <p class="text-light">JUST REVIEWED....</p>

                        <div class="row">
                          <div class="card-group">
                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/soul.jpeg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/lost.jpg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/jojo.jpg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/norm_north.jpg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/IO.jpg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/moonrise.jpg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/next_gen.jpg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/arriety.jpg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/notebook.jpg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/amelie.jpg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/schoolofrock.jpg" alt="Card image cap">


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="card">
                                <img class="card-img-top img-top" src="assets/img/whiplash.jpg" alt="Card image cap">


                            </div>
                        </div>
                        </div>
                        </div>
                      </section>

                      <section>
                        <br>
                        <br>
                        <br>

                        <div class="container-fluid">
                          <div class="row">

                        <div class="col-8">
                          <p class="text-light">POPULAR REVIEWS</p>

                        <ul class="list-unstyled">
  <li class="media">
    <img src="assets/img/whiplash.jpg" class="mr-3" height="240" width="180" alt="...">
    <div class="media-body">
      <h5 class="mt-0 mb-1">Whiplash</h5>
      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    </div>
  </li>
  <li class="media my-4">
    <img src="assets/img/arriety.jpg" class="mr-3" height="240" width="180" alt="...">
    <div class="media-body">
      <h5 class="mt-0 mb-1">Arriety</h5>
      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    </div>
  </li>
  <li class="media">
    <img src="assets/img/amelie.jpg" class="mr-3" height="240" width="180" alt="...">
    <div class="media-body">
      <h5 class="mt-0 mb-1">Amelie</h5>
      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    </div>
  </li>
</ul>

</div>

<div class="col-4">
  <p>POPULAR PUBLIC WATCHLISTS</p>
  <img src="assets/img/poplist1.png">
  <p><i class="fas fa-heart"></i>Candy Cinema</p>
  <P>1,089,678 likes</p>
  <br>
  <img src="assets/img/poplist2.png">
  <p><i class="fas fa-heart"></i>Movies for boredom</p>
  <P>635,467 likes</p>
  <br>
  <img src="assets/img/poplist3.png">
  <p><i class="fas fa-heart"></i>The greatest list on Earth</p>
  <P>483,795 likes</p>
</div>

</div>
</div>


                      </section>

                      <section>

                        <p class="text-light">RECENT NEWS</p>


                        <div class="card-group">
  <div class="card text-white bgcardcolor mb-3">
    <img src="assets/img/jason.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Life in Film: Jason Isaacs</h5>
      <p class="card-text">We chat to cinema’s favorite baddie about lockdown film selections and more.</p>
    </div>
    <div class="card-footer">
      <small class="text-light">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card text-white bgcardcolor mb-3">
    <img src="assets/img/deepend.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Deep End</h5>
      <p class="card-text">We talk with the filmmakers behind heart-shattering Netflix hit Pieces of a Woman.</p>
    </div>
    <div class="card-footer">
      <small class="text-light">Last updated 1 hour ago</small>
    </div>
  </div>
  <div class="card text-white bgcardcolor mb-3">
    <img src="assets/img/sculpting.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Sculpting in TIme</h5>
      <p class="card-text">Justine Smith examines our cinematic past to help us process the present.</p>
    </div>
    <div class="card-footer">
      <small class="text-light">Last updated 3 days ago</small>
    </div>
  </div>
</div>



                      </section>


            </div>
        </div>
    </div>
</div>
@endsection
