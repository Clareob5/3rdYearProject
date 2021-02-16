@extends('layouts.app')
@section('content')
<div class="container background-dark">
    <div class="row">

      <div class="container-fluid">
        <div class="row">

          <div class="col-8">
            <h1><i class="fas fa-user-alt"></i></h1>
          </div>

      <div class="col-4">
    <h3 class="text-center">Ted Bo</h3>
  </div>

</div>
  </div>


    <div class="container-fluid">
      <div class="row">

      <div class="col-8">
    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ? : Auth::user()->name }}" placeholder="Enter Name">
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{$errors->first('name')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="date">Date of Birth</label>
            <input type="date" name="date" id="dob" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" value="{{ old('dob') ? : Auth::user()->dob }}" placeholder="Enter DOB">
            @if($errors->has('dob'))
                <span class="invalid-feedback">
                    {{$errors->first('dob')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('email') ? : Auth::user()->email }}" placeholder="Enter Email">
            @if($errors->has('email'))
                <span class="invalid-feedback">
                    {{$errors->first('email')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Enter New Password">
            @if($errors->has('password'))
                <span class="invalid-feedback">
                    {{$errors->first('password')}}
                </span>
            @endif
        </div>
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
            <label class="custom-file-label" for="image">Profile Image</label>
            @if($errors->has('image'))
                <span class="invalid-feedback">
                    {{$errors->first('image')}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Details</button>
    </form>
  </div>


  <div class="col-4 bt_space">
    <button type="button" class="btn btn-success">View Watchlist</button>
    <br>
    <br>
    <button type="button" class="btn btn-success">Create Group<i class="fas fa-plus-circle"></i></button>
    <br>
    <br>
    <button type="button" class="btn btn-success">View Groups</button>
  </div>

</div>
</div>


<section>
  <br>
  <br>
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

      <div class="container-fluid see_more">
      <div class="row justify-content-center">

        <p><u>See More<u></p>

        </div>
      </div>








  </div>
</div>
@endsection
