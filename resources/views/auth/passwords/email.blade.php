@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">



      <div class="col-md-4">
        <img src="https://cdn.dribbble.com/users/77121/screenshots/15400050/media/699c1f5a6056287affa8febc6eeeda92.gif" height="440" width="550">
      </div>



        <div class="col-md-8">
            <div class="card box_style">
                <h1 class="slightPush4">{{ __('Reset Password') }}</h1>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('login') }}" class="btn btn-default">Cancel</a>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
