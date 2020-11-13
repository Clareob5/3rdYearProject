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
        <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $movie->title) }}" />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ old('description', $movie->description) }}" />
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" name="genre" id="genre" value="{{ old('genre', $movie->genre) }}" />
                </div>
                <div class="form-group">
                    <label for="director">Director</label>
                    <input type="text" class="form-control" name="director" id="director" value="{{ old('director', $movie->director) }}" />
                </div>
                <div class="form-group">
                    <label for="actor">Actor</label>
                    <input type="text" class="form-control" name="actor" id="actor" value="{{ old('actor', $movie->actor) }}" />
                </div>
                <div class="form-group">
                    <label for="release_date">Release Date</label>
                    <input type="date" class="form-control" name="release_date" id="release_date" value="{{ old('release_date', $movie->release_date) }}" />
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
