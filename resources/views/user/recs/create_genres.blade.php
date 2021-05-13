@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12 topspace">
            <div class="card box_style">
              <h2 class="center_text">Choose Genres</h2>
                <div class="card-header"></div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif




                    <form method="POST" action="{{ route('user.recs.create_genres.store', Auth::user()->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <h4>Select Multiple of Your Favourite Movie Genres!</h4>

                            <div class="container-fluid topspace">
                              <div class="row">


                                <div class="col-md-3 ">
                                  <img src="/assets/img/kidnapping.jpg" height="240" width="180">
                            <input type="checkbox" name="genres[]" value="Action & Adventure">Action & Adventure<br>
                          </div>

                          <div class="col-md-3">
                            <img src="/assets/img/annabelle.jpg" height="240" width="180">
                            <input type="checkbox" class="push2" name="genres[]" value="Horror">Horror<br>
                          </div>

                          <div class="col-md-3">
                            <img src="/assets/img/sound.jpg" height="240" width="180">
                            <input type="checkbox" name="genres[]" value="Drama">Drama<br>
                          </div>

                          <div class="col-md-3">
                            <img src="/assets/img/schoolofrock.jpg" height="240" width="180">
                            <input type="checkbox" name="genres[]" value="Comedy">Comedy<br>
                          </div>

                          <div class="col-md-3 topspace">
                            <img src="/assets/img/StarWarsTLJ.jpg" height="240" width="180">
                            <input type="checkbox" name="genres[]" value="Sci-Fi & Fantasy">Sci-Fi & Fantasy<br>
                          </div>

                          <div class="col-md-3 topspace">
                            <img src="/assets/img/the_runner.jpg" height="240" width="180">
                            <input type="checkbox" name="genres[]" value="Thriller">Thriller<br>
                          </div>

                          <div class="col-md-3 topspace">
                            <img src="/assets/img/wolfwalkers.jpg" height="240" width="180">
                            <input type="checkbox" name="genres[]" value="Children & Family">Children & Family<br>
                          </div>
                            <br>

                            <div class="col-md-12">
                              <br>
                            <button type="submit" class="btn create_btn pull-right">Proceed</button>
                            <a href="{{ route('user.profile')}}" class="btn pull-right">Skip</button>
                            </div>
                        </fieldset>
                    </form>


                  </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
