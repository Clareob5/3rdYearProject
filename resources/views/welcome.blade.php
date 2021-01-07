@extends('layouts.guest')

@section('content')
<div class="container background-dark">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card header">
                <img src="assets/img/headerimg2.jpg" class="img-fluid" alt="...">
            </div>
            <section>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                      <h3>Popular Movies</h3>
                    </div>
                    <div class="row">
                            <div class="col-md-2 active">
                                <div class="card my_card">
                                    <img class="card-img-top img-fluid" src="assets/img/image.jpg" height="300" alt="Card image cap">
                                    <div class="card-body card_padding">
                                        <h4 class="card-title title_size">Annabelle</h4>

                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="card my_card">
                                    <img class="card-img-top img-fluid" src="assets/img/image2.jpg" alt="Card image cap">
                                    <div class="card-body card_padding">
                                        <h4 class="card-title title_size">IO</h4>

                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="card my_card">
                                    <img class="card-img-top img-fluid" src="assets/img/image3.jpg" alt="Card image cap">
                                    <div class="card-body card_padding">
                                        <h4 class="card-title title_size">The Last Jedi</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card my_card">
                                    <img class="card-img-top img-fluid" src="assets/img/image4.jpg" alt="Card image cap">
                                    <div class="card-body card_padding">
                                        <h4 class="card-title title_size">The Equalizer</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card my_card">
                                    <img class="card-img-top img-fluid" src="assets/img/image5.jpeg" alt="Card image cap">
                                    <div class="card-body card_padding">
                                        <h4 class="card-title title_size">Insidious</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card my_card">
                                    <img class="card-img-top img-fluid" src="assets/img/image6.jpeg" alt="Card image cap">
                                    <div class="card-body card_padding">
                                        <h4 class="card-title title_size">The Dark Knight</h4>

                                    </div>
                                </div>
                            </div>
                      </section>
            </div>
        </div>
    </div>
</div>
@endsection
