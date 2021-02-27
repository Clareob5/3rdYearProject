@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                    <form method="POST" action="{{ route('user.recs.genres.update', Auth::user()->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <fieldset>
                            <legend>Select</legend>
                            <input type="checkbox" name="genres[]" value="Action">Action<br>
                            <input type="checkbox" name="genres[]" value="Horror">Horror<br>
                            <input type="checkbox" name="genres[]" value="Drama">Drama<br>
                            <input type="checkbox" name="genres[]" value="Comedy">Comedy<br>
                            <br>
                            <button type="submit" class="btn btn-primary pull-right">Next</button>
                            <a href="{{ route('profile.index')}}" class="btn pull-right">Skip</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
