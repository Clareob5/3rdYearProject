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
                    <a href="" class="btn btn-primary ">Update Recs</a>
                    <a href="{{ route('profile.index') }}" class="btn btn-primary ">Update Details</a>
                </div>
              </div>
              <div class="card col-md-3">
                <div class="card-header"><p></p></div>
                  <a href="" class="btn btn-primary">View Watchlist</a>
                  <a href="{{ route('user.groups.create') }}" class="btn btn-primary ">Create Group</a>
                  <a href="" class="btn btn-primary ">View Groups</a>
              </div>
        </div>


</div>
@endsection
