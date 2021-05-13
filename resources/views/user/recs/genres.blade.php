@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="center_text">Choose Genres</h2>
            <div class="card box_style">
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
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="genres[]" value="Action & Adventure">
                            <label class="custom-control-label" for="customCheck">Action & Adventure</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="genres[]" value="Horror">
                            <label class="custom-control-label" for="customCheck2">Horror</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="genres[]" value="Drama">
                            <label class="custom-control-label" for="customCheck3">Drama</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="genres[]" value="Comedy">
                            <label class="custom-control-label" for="customCheck4">Comedy</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="genres[]" value="Sci-Fi & Fantasy">
                            <label class="custom-control-label" for="customCheck5">Sci-Fi & Fantasy</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="genres[]" value="Thriller">
                            <label class="custom-control-label" for="customCheck6">Thriller</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck7" name="genres[]" value="Children & Family">
                            <label class="custom-control-label" for="customCheck7">Children & Family</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck8" name="genres[]" value="Romance">
                            <label class="custom-control-label" for="customCheck8">Romance</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck9" name="genres[]" value="Musical">
                            <label class="custom-control-label" for="customCheck9">Musical</label>
                            </div>
                          </br>
                            <button type="submit" class="btn create_btn pull-right">Proceed</button>
                            <a href="{{ route('user.profile')}}" class="btn pull-right">Skip</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
