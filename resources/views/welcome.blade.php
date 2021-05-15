@extends('layouts.app')

@section('content')
<div class="container background-dark">

  <!-- settng background as dark and centering content -->
    <div class="row justify-content-center">
        <div class="col-md-12">

          <!-- creating a banner within a card -->
            <div class="card header">
                <img src="assets/img/bigguestbanner.png" class="img-fluid" alt="Main Banner">
            </div>

            <!-- Join Now button for guests to encourage new users to join, centering button and linking to register page. -->
            <div class="row justify-content-center topPadding">
                <div class="d-grid gap-2 col-2 mx-auto">
                    <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-success btn-lg">JOIN NOW</button></a>
                </div>
            </div>

            <!-- small blurb to describe what the site does. centered and text is muted to not distract too much from overall page. topPadding used to space between button -->
            <div class="row justify-content-center topPadding">
                <h4 class="text-muted">Alpha Films lets you keep track of movies you've watched, create groups and choose movies with friends!</h4>

            </div>
        </div>

        <!-- topPadding used to space between content -->
        <!-- listening for the sessiong status -->
        <section class="topPadding">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <!-- creating card group of popular movies on the site -->
            <!-- guests can rollover cards to read movie description. option to click button to sign up if they want to read more. -->
            <!-- looping through movies in backend to display 6 movies on page along with movies title and release year -->
            <div>
                <h5>POPULAR MOVIES</h5>
            </div>
            <div class="row">
                <div class="card-group">
                    @foreach ($movies as $movie)
                    <div class="col-md-2 active fadeIn">
                        <div class="card bgcardcolor" data-aos="zoom-in">
                            <img class="card-img-top img-top" src="{{ '../assets/img/' . $movie->cover }}" height="240" alt="Card image cap">
                            <div class="bgcardcolor text-white push2 topspace">
                              <h6>{{ $movie->title }}</h6>
                              <h6 class="topspace">( {{ $movie->release_year }} )</h6>
                            </div>
                            <!-- creating overlay of text over card when mouse hovers over -->
                            <div class="overlay">
                              <h5 class="text topspace push4 bold">Film Description:</h5>
                            <div class="text push2">{{ $movie->description }}</div>
                            <!-- topspace used for button to space between content. Button links to register to encourage new potential users to join -->
                            <div class="topspace2">
                          <a class="push2" href="{{ route('register') }}">  <button type="button" class="btn btn-warning btn-sm">Sign up now for more!</button> </a>
                        </div>
                            </div>


                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

<!-- small banner to space between sections and change format slightly -->
        <section class="topPadding">

            <div class="col-md-12">
                <div>
                    <img src="assets/img/smallbanner.png" class="img-fluid" alt="...">
                </div>
            </div>
        </section>


<!-- just reviewed section displays movies recently reviewed by users on the site. -->
<!-- looping through revent reviews in backend using foreach loop to display recently reviewes film -->
        <section class="topPadding">

            <h5 class="text-light">TOP RATED MOVIES</h5>
            <div class="row">
                <div class="card-group">
                    @foreach ($recent_reviews as $recent_review)
                    <div class="col-md-1 fadeIn shadow">
                        <div class="card bgcardcolor">
                            <img class="card-img-top img-top" src="{{ '../assets/img/' . $recent_review->cover }}" alt="Card image cap">
                        </div>

                        <!-- creating overlay of text over card when mouse hovers over -->
                        <div class="overlay">
                          <p class="text topspace push4">Rating:</p>
                          <p class="text topspace push4">{{ $movie->rating }} stars</p></div>

                    </div>
                    @endforeach
                </div>
            </div>
        </section>


<!-- recently added section lets guests know what movies have been recently added on the site. -->
<!-- movies are all being retrieved from the back end using a foreach loop and movie title and description accompanying the movie -->
<!-- movies displayed within a list - bootstrap component -->
        <section class="topPadding">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-light push4">RECENTLY ADDED</h5>

                        <ul class="list-unstyled">
                            <div class="container-fluid">
                                <div class="row">
                                    @foreach ($recent_movies as $movie)

                                    <li class="media col-6">
                                        <img src="{{ '../assets/img/' . $movie->cover }}" class="mr-3 topspace" height="240" width="160" alt="...">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">{{$movie->title}}</h5>
                                            <p>{{$movie->description}}</p>

                                        </div>
                                    </li>

                                    @endforeach
                                </div>
                            </div>



                    </div>
                </div>


        </section>



<!-- last section showing what recent news about films is available. currently recent news is being hardcoded. -->
        <section class="topPadding">

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
