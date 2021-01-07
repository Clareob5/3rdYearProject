@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to Reels and Meals!

                  </br>
                  </br>

                  Read more <a href="{{ route('about') }}"> About Us</a>
                  <!-- link goes to about us page using about route -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
