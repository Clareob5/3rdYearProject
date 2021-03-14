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
    <h3 class="text-center">{{ Auth::user()->name }}</h3>
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
            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} text-light" value="{{ old('name') ? : Auth::user()->name }}" placeholder="Enter Name">
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{$errors->first('name')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="date">Date of Birth</label>
            <input type="date" name="date" id="dob" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }} text-light" value="{{ old('dob') ? : Auth::user()->dob }}" placeholder="Enter DOB">
            @if($errors->has('dob'))
                <span class="invalid-feedback">
                    {{$errors->first('dob')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} text-light" value="{{ old('email') ? : Auth::user()->email }}" placeholder="Enter Email">
            @if($errors->has('email'))
                <span class="invalid-feedback">
                    {{$errors->first('email')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} text-light" placeholder="Enter New Password">
            @if($errors->has('password'))
                <span class="invalid-feedback">
                    {{$errors->first('password')}}
                </span>
            @endif
        </div>
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}} text-light" id="image">
            <label class="custom-file-label" for="image">Profile Image</label>
            @if($errors->has('image'))
                <span class="invalid-feedback">
                    {{$errors->first('image')}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btcolor mt-3">Update Details</button>
        <a href="{{route('profile.show', Auth::user()->id)}}" class="btn btcolor mt-3">Update Recommedations</a>
    </form>
  </div>


  <div class="col-4 bt_space">
    <a href="{{route('user.watchlist', Auth::user()->id)}}" type="button" class="btn btn-success">View Watchlist</a>
    <br>
    <br>
    <a href="{{route('user.groups.create', Auth::user()->id)}}" type="button" class="btn btn-success">Create Group<i class="fas fa-plus-circle"></i></a>
    <br>
    <br>
    <a href="{{route('user.groups.show', $group->id)}}" type="button" class="btn btn-success">View Groups</a>
  </div>

</div>
</div>


<section>
  <br>
  <br>
  <p class="text-light">YOUR MOVIE RECOMMENDATIONS</p>
  <div class="row">
    <div class="card-group">
        @foreach ($movies as $movie)
          @for ($i=0; $i < 6; $i++)
            @if ($movie->id == $recomms[$i]['id']) <div class="col-md-2 active">
              <div class="card">
                  <img class="card-img-top img-top" src="{{ '../assets/img/' . $movie->cover }}" height="240" alt="Card image cap">
                  <div class="card-img-overlay">
                    <a href="javascript:void();" class="card-title add_to_wishlist light-link" data-quantity="1" data-id="{{ $movie->id }}" id="add_to_wishlist_{{$movie->id}}">  <h3><i class="fas fa-heart"></i></h3></a>
                  </div>
                  <div class="bg-dark text-white">
                      <h6>{{ $movie->title }}</h6><p>{{ $movie->release_year }}</p>
                      <div class="col-12">
                        <a href="{{ route('user.movies.show', $movie->id)  }}" type="button" class="btn btcolor mt-3"><h6>Read more</h6></a>
                      </div>
                      {{-- <div>
                          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                      </div> --}}
                  </div>
              </div>
          </div>
          @endif
        @endfor
      @endforeach
    </div>
  </section>








  </div>
</div>
@endsection

@section('javascript')
<script>
  $(document).on('click','.add_to_wishlist',function(e){
    e.preventDefault();
    var movie_id=$(this).data('id');
    var movie_qty=$(this).data('quantity');
    console.log(movie_id);

    var token="{{csrf_token()}}";
    var path="{{route('user.watchlist.store')}}";

    $.ajax({
      url:path,
      type:"POST",
      dataType:"JSON",
      data:{
        movie_id:movie_id,
        movie_qty:movie_qty,
        _token:token,
      },
      beforeSend:function () {
        $('#add_to_wishlist_'+movie_id).html('<i class="fas fa-heart"></i>');
      },
      complete:function () {
        $('#add_to_wishlist_'+movie_id);
      },
      success:function (data) {
        console.log(data);

        if(data['status']){
          $('body #header-ajax').html(data['header']);
          $('body #cart_counter').html(data['cart_count']);
          swal({
            title: "Good job!",
            text: data['message'],
          })
        }
      }
    })
  })
</script>
@endsection
