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
            <h4 class="text-light">Welcome back Ted Bo</h4>

          </div>

          <div class="row justify-content-center">
            <p class="text-light">This page will become more active as you add more movies to your watchlist</p>

          </div>
        </div>

            <br>
            <br>


            <section>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-2">
                        <div class="card my_card">
                            <img class="card-img-top img-fluid" src="../assets/img/image5.jpeg" alt="Card image cap">
                            <div class="card-body card_padding">
                                <h4 href="" class="card-title title_size">Insidious</h4>

<<<<<<< HEAD
                    <p class="text-light">YOUR MOVIE RECOMMENDATIONS</p>
                    <div class="row">
                      <div class="card-group">

                            <div class="col-md-2 active">
                                <div class="card">
                                    <img class="card-img-top img-top" src="/assets/img/moonrise.jpg" height="240" alt="Card image cap">
                                    <div class="card-img-overlay">
                                      <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                    </div>
                                    <div class="bg-dark text-white">
                                    <h6>Moonrise Kingdom <br>(2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>
                                </div>
                            </div>

                            <div class=" col-md-2">
                                <div class="card">
                                    <img class="card-img-top img-top" src="/assets/img/image2.jpg" height="240" alt="Card image cap">
                                    <div class="card-img-overlay">
                                      <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                    </div>
                                    <div class="bg-dark text-white">
                                    <h6>The IO <br>(2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>

                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="card">
                                    <img class="card-img-top img-top" src="/assets/img/image4.jpg" height="240" alt="Card image cap">
                                    <div class="card-img-overlay">
                                      <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                    </div>
                                    <div class="bg-dark text-white">
                                    <h6>The Equalizer 2 <br>(2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img class="card-img-top img-top" src="/assets/img/shedies.jpg" height="240" alt="Card image cap">
                                    <div class="card-img-overlay">
                                      <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                    </div>
                                    <div class="bg-dark text-white">
                                    <h6>She Dies Tomorrow <br>(2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img class="card-img-top img-top" src="/assets/img/cheaper.jpg" height="240" alt="Card image cap">
                                    <div class="card-img-overlay">
                                      <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                    </div>
                                    <div class="bg-dark text-white">
                                    <h6>Cheaper by the Dozen <br>(2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>


                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img class="card-img-top img-top" src="/assets/img/apocalypse.jpg" height="240" alt="Card image cap">
                                    <div class="card-img-overlay">
                                      <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                    </div>
                                    <div class="bg-dark text-white">
                                    <h6>Apocalypse Now <br>(2019)</h6>
                                    <div>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                  </div>
                                </div>

                                </div>
                                </div>

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

                      <section>
                        <br>
                        <br>

                              <p class="text-light">POPULAR ON ALPHA FILMS</p>
                              <div class="row">
                                <div class="card-group">
                                      <div class="col-md-2 active">
                                          <div class="card">
                                              <img class="card-img-top img-top" src="/assets/img/promising.jpg" height="240" alt="Card image cap">
                                              <div class="card-img-overlay">
                                                <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                              </div>
                                              <div class="bg-dark text-white">
                                              <h6>Promising Young Woman <br>(2019)</h6>
                                              <div>
                                              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            </div>
                                          </div>

                                          </div>
                                      </div>
                                      <div class=" col-md-2">
                                          <div class="card">
                                              <img class="card-img-top img-top" src="/assets/img/soul.jpeg" height="240" alt="Card image cap">
                                              <div class="card-img-overlay">
                                                <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                              </div>
                                              <div class="bg-dark text-white">
                                              <h6>Soul <br>(2021)</h6>
                                              <div>
                                              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            </div>
                                          </div>

                                          </div>
                                      </div>
                                      <div class=" col-md-2">
                                          <div class="card">
                                              <img class="card-img-top img-top" src="/assets/img/onenight.jpg" height="240" alt="Card image cap">
                                              <div class="card-img-overlay">
                                                <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                              </div>
                                              <div class="bg-dark text-white">
                                              <h6>One Night in Miami <br>(2019)</h6>
                                              <div>
                                              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            </div>
                                          </div>

                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="card">
                                              <img class="card-img-top img-top" src="/assets/img/euphoria.jpg" alt="Card image cap">
                                              <div class="card-img-overlay">
                                                <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                              </div>
                                              <div class="bg-dark text-white">
                                              <h6>Euphoria <br>(2019)</h6>
                                              <div>
                                              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            </div>
                                          </div>

                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="card">
                                              <img class="card-img-top img-top" src="/assets/img/sound.jpg" alt="Card image cap">
                                              <div class="card-img-overlay">
                                                <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                              </div>
                                              <div class="bg-dark text-white">
                                              <h6>Sound of Metal <br>(2019)</h6>
                                              <div>
                                              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            </div>
                                          </div>


                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="card">
                                              <img class="card-img-top img-top" src="/assets/img/parasite.jpg" height="245" alt="Card image cap">
                                              <div class="card-img-overlay">
                                                <h3 class="card-title"><i class="fas fa-heart"></i></h3>
                                              </div>
                                              <div class="bg-dark text-white">
                                              <h6>Parasite <br>(2019)</h6>
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

                                  <p>LATEST NEWS</p>

                                  <div class="card mb-3 bg-dark" style="max-width: 1140px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="/assets/img/rose.png" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Rose Glass, Darkly</h5>
          <p class="card-text">The writer-director of long-awaited A24 horror Saint Maud tells us about finding comfort in psychological thrillers, being terrified of gremlins, and drawing from Joan of Arc’s story for her expressive, bold debut.</p>
          <p class="card-text"><small class="text-muted"><b>READ MORE<b></small></p>
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

                                    <div class="card mb-3 bg-dark" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="/assets/img/notebook.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">The Notebook</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-light">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3 bg-dark" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="/assets/img/whiplash.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Whiplash</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-light">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

</div>

<div class="col-6">

  <div class="card mb-3 bg-dark" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="/assets/img/parasite.jpg" height="260" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Parasite</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-light">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-3 bg-dark" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="/assets/img/moonrise.jpg" height="270" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Moonrise Kingdom</h5>
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
  <div class="card text-white bg-dark mb-3">
    <img src="/assets/img/modest.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Modest Heroes</h5>
      <p>Best Indie animated films</p>
    </div>
  </div>
  <div class="card text-white bg-dark mb-3">
    <img src="/assets/img/spirited.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Spirited Away</h5>
      <p>Best ASMR films</p>
    </div>
  </div>
  <div class="card text-white bg-dark mb-3">
    <img src="/assets/img/unforgiven.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Unforgiven</h5>
      <p>Best revenge films</p>
    </div>
  </div>
  <div class="card text-white bg-dark mb-3">
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

                          <div class="card text-white bg-dark mb-3">
                            <img src="/assets/img/chame.png" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Chameleon</h5>
                              <p class="card-text">We talk to genre-bending J-horror auteur Kiyoshi Kurosawa about his new film.</p>
                            </div>
                            <div class="card-footer">
                              <small class="text-light">Last updated 2 hours ago</small>
                            </div>
                          </div>
  <div class="card text-white bg-dark mb-3">
    <img src="/assets/img/jason.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Life in Film: Jason Isaacs</h5>
      <p class="card-text">We chat to cinema’s favorite baddie about lockdown film selections and more.</p>
    </div>
    <div class="card-footer">
      <small class="text-light">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card text-white bg-dark mb-3">
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


=======
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card my_card">
                            <img class="card-img-top img-fluid" src="../assets/img/image6.jpeg" alt="Card image cap">
                            <div class="card-body card_padding">
                                <h4 class="card-title title_size">The Dark Knight</h4>

                            </div>
                        </div>
                    </div>
            </section>
            <br>
            <div class="card-header">
                <h3>Groups</h3>
            </div>
            <div class="row">

                @foreach ($groups as $group)
                <div class="col-md-3 active">
                    <div class="card ">
                        <div class="card-body card_padding">
                            <h4 href="" class="card-title"><strong>{{ $group->group_name }}</strong></h4>

                        </div>
                    </div>
                </div>
                @endforeach
>>>>>>> c7dab86fe06d7ce342562ce5f02ebe7bd9360ec4
            </div>
            </div>

    </div>
</div>
</div>
@endsection
