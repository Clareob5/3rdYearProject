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
                <h4 class="text-muted">Alpha Films lets you keep track of movies you've watched, create groups and choose movies with friends!</h4>

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
                <h5>POPULAR MOVIES</h5>
            </div>
            <div class="row">
                <div class="card-group">
                    @foreach ($movies as $movie)
                    <div class="col-md-2 active">
                        <div class="card bgcardcolor">
                            <img class="card-img-top img-top" src="{{ '../assets/img/' . $movie->cover }}" height="240" alt="Card image cap">
                            <div class="bgcardcolor text-white push2 topspace">
                                <h6>{{ $movie->title }}</h6>
                                <p>{{ $movie->release_year }}</p>

                            </div>
                        </div>
                    </div>
                    @endforeach
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
            </div>
        </section>

        <!-- <section>
            <br>
            <br>
            <br>
            <h5 class="text-light">ALPHA FILMS LETS YOU....</h5>
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
        </section> -->

        <section>
          <br>
          <br>
            <h5 class="text-light">JUST REVIEWED....</h5>
            <div class="row">
                <div class="card-group">
                    @foreach ($recent_reviews as $recent_review)
                    <div class="col-md-1">
                        <div class="card bgcardcolor">
                            <img class="card-img-top img-top" src="{{ '../assets/img/' . $recent_review->cover }}" alt="Card image cap" height="240">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section>
            <br>
            <br>
            <br>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-light">RECENTLY ADDED</h5>

                        <ul class="list-unstyled">
                            <div class="container-fluid">
                                <div class="row">
                                    @foreach ($recent_movies as $movie)

                                    <li class="media col-6">
                                        <img src="{{ '../assets/img/' . $movie->cover }}" class="mr-3" height="240" width="180" alt="...">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">{{$movie->title}}</h5>
                                            <p>{{$movie->description}}</p>

                                        </div>
                                    </li>

                                    @endforeach
                                </div>
                            </div>

                            {{-- <div class="col-4">
                                <p>POPULAR PUBLIC WATCHLISTS</p>
                                <img src="assets/img/poplist1.png">
                                <p><i class="fas fa-heart"></i>Candy Cinema</p>
                                <p>1,089,678 likes</p>
                                <br>
                                <img src="assets/img/poplist2.png">
                                <p><i class="fas fa-heart"></i>Movies for boredom</p>
                                <p>635,467 likes</p>
                                <br>
                                <img src="assets/img/poplist3.png">
                                <p><i class="fas fa-heart"></i>The greatest list on Earth</p>
                                <p>483,795 likes</p>
                            </div> --}}

                    </div>
                </div>


        </section>

        <section>

            <h5 class="text-light">RECENT NEWS</h5>


            <div class="card-deck">
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
