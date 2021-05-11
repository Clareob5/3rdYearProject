@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


      <div class="container-fluid">
        <div class="row">
      <div class="col-md-3">
      <img src="https://cdn.dribbble.com/users/1575908/screenshots/7481309/media/8c9c4b4ca4421234f98643199054813c.jpg?compress=1&resize=800x600">
      </div>

      <div class="col-md-3">
      <img src="https://cdn.dribbble.com/users/1575908/screenshots/8900495/media/4e5473d7fc042dd8c72f2ef795d7a6f3.jpg?compress=1&resize=800x600">
      </div>
      <div class="col-md-3">
      <img src="https://cdn.dribbble.com/users/1575908/screenshots/8173066/media/a89e3e63d1924fb9918a9201acd27698.png?compress=1&resize=800x600">
      </div>
      <div class="col-md-3">
      <img src="https://cdn.dribbble.com/users/1575908/screenshots/8102158/media/7015d74623fd5577fd512ff9b76f63aa.jpg?compress=1&resize=800x600">
      </div>



  </div>
    </div>

        <div class="col-md-8 topspace">
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
                                  <img src="/assets/img/kidnapping.jpg">
                            <input type="checkbox" name="genres[]" value="Action & Adventure">Action & Adventure<br>
                          </div>

                          <div class="col-md-3">
                            <img src="/assets/img/annabelle.jpg">
                            <input type="checkbox" class="push2" name="genres[]" value="Horror">Horror<br>
                          </div>

                          <div class="col-md-3">
                            <img src="/assets/img/sound.jpg">
                            <input type="checkbox" name="genres[]" value="Drama">Drama<br>
                          </div>

                          <div class="col-md-3">
                            <img src="/assets/img/schoolofrock.jpg">
                            <input type="checkbox" name="genres[]" value="Comedy">Comedy<br>
                          </div>

                          <div class="col-md-3 topspace">
                            <img src="/assets/img/StarWarsTLJ.jpg">
                            <input type="checkbox" name="genres[]" value="Sci-Fi & Fantasy">Sci-Fi & Fantasy<br>
                          </div>

                          <div class="col-md-3 topspace">
                            <img src="/assets/img/the_runner.jpg">
                            <input type="checkbox" name="genres[]" value="Thriller">Thriller<br>
                          </div>

                          <div class="col-md-3 topspace">
                            <img src="/assets/img/wolfwalkers.jpg">
                            <input type="checkbox" name="genres[]" value="Children & Family">Children & Family<br>
                          </div>
                            <br>

                            <div class="col-md-12">
                              <br>
                            <button type="submit" class="btn btn-primary pull-right">Next</button>
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
