@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.recs.genres.store') }}" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <fieldset>
                          <legend>Select</legend>
                          <input type="checkbox" name="genres[]" value="Action">Action<br>
                          <input type="checkbox" name="genres[]" value="Horror">Horror<br>
                          <input type="checkbox" name="genres[]" value="Drama">Drama<br>
                          <input type="checkbox" name="genres[]" value="Comedy">Comedy<br>
                          <br>
                          <button type="submit" class="btn btn-primary pull-right">Submit</button>
                          <a href="{{ route('profile_show.show')}}" class="btn pull-right">Skip</button>
                      </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
