@extends('layouts.app')

@section('content')
<div class="container-fluid background-dark">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="row justify-content-center">
<div class="card bgcardcolor text-white">
<img class="card-img" src="https://cdn.dribbble.com/users/783623/screenshots/9135790/media/64454c75193afe21c6854641e7a92ded.jpg?compress=1&resize=1400x400">
<div class="card-img-overlay see_more">
<h1 class="card-title bold slightPush">User Watchlist</h1>
<h3 class="card-text bold slightPush3">Saved movies to watch later</h3>
</div>
</div>
</div>
</div>

<!-- search bar component not working -->
<!-- <div class="col-md-4">
<livewire:search-watchlist />
</div> -->

</div>
</div>
<section>
<br>
<br>
<div class="container-fluid">
<div class="row justify-content-between">
@foreach (Auth::user()->movies as $movie)
<div class="col-md-6">
<div class="card mb-3 bgcardcolor" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-4">
<img src="{{ '../assets/img/' . $movie->cover }}" class="card-img" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title">{{ $movie->title }}</h5>
<p class="card-text">{{ $movie->description }}</p>
<h5 class="card-text topspace"><small class="text-light">GENRE: {{ $movie->genre }}</small></h5>
<h5 class="card-text"><small class="text-light">RATING: {{ $movie->rating }}</small></h5>
<div class="justify-content-center">
<a href="{{ route('user.movies.show', $movie->id) }}" type="button" class="btn btcolor">View More</a>
<form style="display:inline-block" method="POST" action="{{ route('user.watchlist.destroy', $movie->id) }}">
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<button type="submit" class="btn btn-danger">Remove</a>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>
</section>

 <section>
<br>
<div class="justify-content-center">
<a href="{{ route('user.home')}}" class="btn btcolor ">Back</a>
</div>
</section>
@endsection
