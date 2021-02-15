@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                    @foreach ($movies as $movie)
                      @if($movie->id < 3)
                    <div class="col-md-2 active">
                        <div class="card my_card">
                            <img class="card-img-top img-fluid" src="{{ '../assets/img/' . $movie->cover}}" height="300" alt="Card image cap">
                            <div class="card-body card_padding">
                                <h4 class="card-title title_size">{{ $movie->title }}</h4>

                            </div>
                        </div>
                    </div>
                  @endif
                    @endforeach

                </div>
        </div>


    </div>
</div>
@endsection
