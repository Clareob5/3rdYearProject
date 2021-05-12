@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-12">
          <div class="card header">
              <img src="https://cdn.dribbble.com/users/1731254/screenshots/14576082/media/43ef38c0fcb2cf4e492f0afdf7cbad5b.png?compress=1&resize=1400x400" alt="...">
              <div class="card-img-overlay">
                  <h1 class="card-title titlea">About Us</h1>
              </div>

          </div>
          </div>


          <section>
            <div class="container-fluid">
              <div class="row">

                <div class="col-8">
                  <h4>WHAT WE DO</h4>
                  <br>
                  <p>Alpha Films is a movie guide website that allows users to keep track of movies they would like to
                    watch and have watched, create groups where they can add friends and choose movies together remotely.
                    Alpha Films offers a range of movies across different genres such as Action, Drama, Horror and so on. The site aims to offer accurate
                    recommendations for a user to make the task of searching for a movie to watch much easier.

                  </p>
                  <p>  Creators: Vivian Birungi and Clare O'Brien</p>
                </div>

                <div class="col-4">
                  <img src="assets/img/aboutblock.png">
                </div>



              </div>
            </div>
          </section>

          <section>
            <br>
            <br>
            <h4>CONTACT US</h4>
          </section>

          <section>
            <br>
            <br>
            <div class="container-fluid">
              <div class="row">

                <div class="col-2">
                  <p>Randomness and Integrity Services Ltd.

Premier Business Centres

8 Dawson Street

Dublin 2

D02 N767

Ireland



<br>Skype: random.org

<br>Web: www.random.org

<br>Email: contact@random.org</p>

<div class="topspace2">
<a href="{{ route('user.home')}}" class="btn btcolor">Back</a>
</div>

                </div>

                <form>

                <div class="col-10 push">

                  <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                      <div class="col">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror text-light" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                      <div class="col">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror text-light" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group">
      <label for="exampleFormControlTextarea1">Type your query below</label>
      <textarea class="form-control text-light" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btcolor text-light">Submit</button>

                </div>

              </form>

              </div>
            </div>
          </section>



    </div>
</div>
@endsection
