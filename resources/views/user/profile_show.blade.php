@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="card col-md-9">
                <div class="card-header">
                    Profile of {{ Auth::user()->name }}
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Date of Birth</td>
                                <td>{{ date('j F, Y', strtotime(Auth::user()->dob)) }}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>

                        </tbody>
                    </table>
                    <a href="{{ route('user.recs.genres') }}" class="btn btn-primary ">Update Recs</a>
                    <a href="{{ route('profile.index') }}" class="btn btn-primary ">Update Details</a>
                </div>
              </div>
              <div class="card col-md-3">
                <div class="card-header"><p></p></div>
                  <a href="{{ route('user.watchlist') }}" class="btn btn">View Watchlist</a>
                  <a href="{{ route('user.groups.create',Auth::user()->id) }}" class="btn btn">Create Group</a>
                  <a href="" class="btn btn ">View Groups</a>
              </div>
        </div>
        <h3>Recommendend Movies</h3>
        <div class="row">

            @foreach ($movies as $movie)
              @if($movie->id == 2)
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
@endsection
