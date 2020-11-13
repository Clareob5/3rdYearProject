@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  Movie {{ $movie->title }}
                </div>

                <div class="card-body">
                      <table class="table table-hover">
                        <tbody>
                            <tr>
                              <td>Title</td>
                              <td>{{ $movie->title }}</td>
                            </tr>
                            <tr>
                              <td>Description</td>
                              <td>{{ $movie->description }}</td>
                            </tr>
                            <tr>
                              <td>Genre</td>
                              <td>{{ $movie->genre }}</td>
                            </tr>
                            <tr>
                              <td>Director</td>
                              <td>{{ $movie->director }}</td>
                            </tr>
                            <tr>
                              <td>Actor</td>
                              <td>{{ $movie->actor }}</td>
                            </tr>
                            <tr>
                              <td>Release Date</td>
                              <td>{{ $movie->release_date }}</td>
                            </tr>
                        </tbody>
                      </table>
                    <a href="{{ route('admin.movies.index')}}" class="btn ">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
