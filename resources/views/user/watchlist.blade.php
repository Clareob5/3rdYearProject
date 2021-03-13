@extends('layouts.app')

@section('content')
<div class="container-fluid background-dark">
    <div class="row justify-content-center">

      <div class="col-md-8">
        <h1 class="text-light">User Watchlist</h1>

      </div>

      <div class="col-md-4">
        <div class="row justify-content-center">
          <button type="button" class="btn filtercolor dropdown-toggle text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filter
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Comedy</a>
            <a class="dropdown-item" href="#">Romance</a>
            <a class="dropdown-item" href="#">Drama</a>
          </div>

    </div>

      </div>

      <!-- <form class="form-inline my-2 my-lg-0">
<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn filtercolor my-2 my-sm-0 text-light" type="submit">Search</button>
</form> -->

<!-- s -->


        <!-- <div class="col-md-12">

          <div class="row justify-content-center">
        <h2 class="text-light">User Watchlist</h2>

      </div>

          <div class="row justify-content-center">
        <h5 class="text-light">Collect, curate and share. Lists are the perfect way to group films.</h5>

      </div>

      <br>

      <div class="row justify-content-center">
        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Filter
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Comedy</a>
          <a class="dropdown-item" href="#">Romance</a>
          <a class="dropdown-item" href="#">Drama</a>
        </div>

  </div>

      <br>
      <br>

      <div class="row justify-content-center">
        <img src="/assets/img/thirdbanner.png">

      </div> -->

        </div>
        </div>



        <section>
          <br>
          <br>
                  <div class="container-fluid">
                  <p>POPULAR REVIEWS</p>
                </div>


                  <div class="container-fluid">
                    <div class="row">

                  <div class="col-6">

                    <div class="card mb-3 bgcardcolor" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="/assets/img/notebook.jpg" class="card-img" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">The Notebook (2012)</h5>
<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
<div class="row justify-content-center">
<button type="button" class="btn btcolor">View More</button>
</div>
<h5 class="card-text topspace"><small class="text-light">GENRE: Romance</small></h5>
<h5 class="card-text"><small class="text-light">RATING: 91.5% 3.5</small></h5>
</div>
</div>
</div>
</div>

<div class="card mb-3 bgcardcolor" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="/assets/img/whiplash.jpg" class="card-img" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">Whiplash (2016)</h5>
<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
<div class="row justify-content-center">
<button type="button" class="btn btcolor">View More</button>
</div>
<h5 class="card-text topspace"><small class="text-light">GENRE: Drama</small></h5>
<h5 class="card-text"><small class="text-light">RATING: 91.5% 3.5</small></h5>
</div>
</div>
</div>
</div>

</div>

<div class="col-6">

<div class="card mb-3 bgcardcolor" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="/assets/img/parasite.jpg" height="260" class="card-img" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">Parasite (2019)</h5>
<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
<div class="row justify-content-center">
<button type="button" class="btn btcolor">View More</button>
</div>
<h5 class="card-text topspace"><small class="text-light">GENRE: Drama</small></h5>
<h5 class="card-text"><small class="text-light">RATING: 91.5% 3.5</small></h5>
</div>
</div>
</div>
</div>

<div class="card mb-3 bgcardcolor" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="/assets/img/moonrise.jpg" height="270" class="card-img" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">Moonrise Kingdom (2014)</h5>
<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
<div class="row justify-content-center">
<button type="button" class="btn btcolor">View More</button>
</div>
<h5 class="card-text topspace"><small class="text-light">GENRE: Coming of Age</small></h5>
<h5 class="card-text"><small class="text-light">RATING: 91.5% 3.5</small></h5>
</div>
</div>
</div>
</div>


</div>

<div class="col-6">

  <div class="card mb-3 bgcardcolor" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="/assets/img/arriety.jpg" class="card-img" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">Arriety (2011)</h5>
<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
<div class="row justify-content-center">
<button type="button" class="btn btcolor">View More</button>
</div>
<h5 class="card-text topspace"><small class="text-light">GENRE: Anime</small></h5>
<h5 class="card-text"><small class="text-light">RATING: 91.5% 3.5</small></h5>
</div>
</div>
</div>
</div>

<div class="card mb-3 bgcardcolor" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="/assets/img/cheaper.jpg" class="card-img" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">Cheaper by the Dozen (2005)</h5>
<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
<div class="row justify-content-center">
<button type="button" class="btn btcolor">View More</button>
</div>
<h5 class="card-text topspace"><small class="text-light">GENRE: Comedy</small></h5>
<h5 class="card-text"><small class="text-light">RATING: 91.5% 3.5</small></h5>
</div>
</div>
</div>
</div>

</div>

<div class="col-6">

<div class="card mb-3 bgcardcolor" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="/assets/img/godfather.jpg" height="260" class="card-img" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">Godfather (1999)</h5>
<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
<div class="row justify-content-center">
<button type="button" class="btn btcolor">View More</button>
</div>
<h5 class="card-text topspace"><small class="text-light">GENRE: Drama</small></h5>
<h5 class="card-text"><small class="text-light">RATING: 91.5% 3.5</small></h5>
</div>
</div>
</div>
</div>

<div class="card mb-3 bgcardcolor" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="/assets/img/heathers.jpg" height="270" class="card-img" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">Heathers (1998)</h5>
<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
<div class="row justify-content-center">
<button type="button" class="btn btcolor">View More</button>
</div>
<h5 class="card-text topspace"><small class="text-light">GENRE: Dark Comedy</small></h5>
<h5 class="card-text"><small class="text-light">RATING: 91.5% 3.5</small></h5>
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
                                 <div class="container-fluid">
                                 <p>GROUP WATCHLISTS</p>
                               </div>

                                 <div class="container-fluid">
                                   <div class="row">

                                     <div class="col-4">
                                       <img src="/assets/img/list1.png">
                                       <p>Group 1 - 9 members</p>
                                     </div>

                                     <div class="col-4">
                                     <img src="/assets/img/list2.png">
                                       <p>Group 2 - 5 members</p>
                                     </div>

                                     <div class="col-4">
                                     <img src="/assets/img/list3.png">
                                       <p>Group 5 - 3 members</p>
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
@endsection
