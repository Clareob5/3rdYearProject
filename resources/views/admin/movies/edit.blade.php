@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <div class="card">
       <div class="card-header">
         Edit movie
       </div>

       <div class="card-body">
         @if($errors->any())
             <div class="alert alert-danger">
               <ul>
                 @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                 @endforeach
               </ul>
             </div>
         @endif
        <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <img src="{{ asset('storage/covers/' . $movie->cover ) }}" width="150" />
                <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control" name="cover" id="cover" />
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $movie->title) }}" />
                </div>
                <div class="form-group">
                    <label for="director">Director</label>
                    <input type="text" class="form-control" name="director" id="director" value="{{ old('director', $movie->director) }}" />
                </div>
                <div class="form-group">
                    <label for="cast">Cast</label>
                    <input type="text" class="form-control" name="cast" id="cast" value="{{ old('cast', $movie->cast) }}" />
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" name="country" id="country" value="{{ old('country', $movie->country) }}" />
                </div>
                <div class="form-group">
                    <label for="date_added">Date Added</label>
                    <input type="text" class="form-control" name="date_added" id="date_added" value="{{ old('date_added', $movie->date_added) }}" />
                </div>
                <div class="form-group">
                    <label for="release_year">Release Year</label>
                    <input type="text" class="form-control" name="release_year" id="release_year" value="{{ old('release_year', $movie->release_year) }}" />
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="text" class="form-control" name="rating" id="rating" value="{{ old('rating', $movie->rating) }}" />
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" class="form-control" name="duration" id="duration" value="{{ old('duration', $movie->duration) }}" />
                </div>
                <div class="form-group">
                    <label for="listed_in">Listed In</label>
                    <input type="text" class="form-control" name="listed_in" id="listed_in" value="{{ old('listed_in', $movie->listed_in) }}" />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ old('description', $movie->description) }}" />
                </div>
                <div>
                  <a href="{{ route('admin.movies.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
           </div>
        </div>
      </div>
   </div>
</div>
@endsection
