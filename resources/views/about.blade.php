@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-12">
          <div class="card header">
              <img src="assets/img/headerimg2.jpg" class="img-fluid" alt="...">
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
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt quam sed ipsum pulvinar, in mattis
                    velit interdum. Vestibulum laoreet ornare orci ut scelerisque. Vivamus arcu diam, accumsan vel venenatis ac,
                     pretium ut eros. Ut eget felis erat. Integer dapibus rutrum porta. Aliquam fringilla dignissim urna in
                     aliquet.
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt quam sed ipsum pulvinar, in mattis
                       velit interdum. Vestibulum laoreet ornare orci ut scelerisque. Vivamus arcu diam, accumsan vel venenatis ac,
                        pretium ut eros. Ut eget felis erat. Integer dapibus rutrum porta. Aliquam fringilla dignissim urna in
                        aliquet.</p>
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



Skype: random.org

Web: www.random.org

Email: contact@random.org</p>

                </div>

                <form>

                <div class="col-10 push">

                  <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                      <div class="col">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group">
      <label for="exampleFormControlTextarea1">Type your query below</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

                </div>

              </form>

              </div>
            </div>
          </section>



    </div>
</div>
@endsection
