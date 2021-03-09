<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/89c132bd15.js" crossorigin="anonymous"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Alpha Films', 'Alpha Films') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Ajax-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
     <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Alpha Films', 'Alpha Films') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @auth
                        @if( Auth::user()->hasRole('admin') )
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.movies.index') }}">{{ __('Movies') }}</a>
                        </li>
                      @endif
                      @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @endguest

                       @auth
                         @if( Auth::user()->hasRole('admin') )
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.home') }}">{{ __('Home') }}</a>
                        </li>
                      @elseif( Auth::user()->hasRole('user') )
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
                        </li>
                      @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{asset('storage/images/'.Auth::user()->image)}}" class="rounded-circle mr-1" height="30px" width="30px" />
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    Dashboard
                                </a>

                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('user.watchlist') }}">
                                    Watchlist
                                </a>

                                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                      @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="flash-message">
                            @foreach(['danger','warning','success','info'] as $key)

                            @if(Session::has($key))
                            <div class="flash alert alert-{{$key}}">{{ Session::get($key) }}
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                            @endif

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>

<script>
    setTimeout(function() {
        $('.flash').alert('close')
    }, 3000);


    $('#laravel_crud').DataTable();

  function addEvent() {
    console.log("Checking modal add event")
    $("#group_id").val('');
    $('#group-modal').modal('show');
  }

  function editGroup(event) {
    var id  = $(event).data("id");
    let _url = `/groups/${id}`;
    $('#dateError').text('');
    $('#timeError').text('');

    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
          if(response) {
            $("#date").val(response.date);
            $("#time").val(response.time);
	    $("#group_id").val(response.id);
            $('#group-modal').modal('show');
          }
      }
    });
  }

  function createEvent() {
//    console.log("Checking create event")
    var date = $('#date').val();
    var time = $('#time').val();
    var id = $('#group_id').val();

    let _url     = `event/store`;
    let _token   = $('meta[name="csrf_token"]').attr('content');

      $.ajax({
        url: _url,
        type: "POST",
        data: {
          id: id,
          date: date,
          time: time,
          _token: _token
        },
        success: function(response) {
            if(response.code == 200) {
              if(id != ""){
                $("#row_"+id+" td:nth-child(2)").html(response.data.date);
                $("#row_"+id+" td:nth-child(3)").html(response.data.time);
              } else {
                $('table tbody').prepend('<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.date+'</td><td>'+response.data.time+'</td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editGroup(event.target)" class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deleteGroup(event.target)">Delete</a></td></tr>');
              }
              $('#date').val('');
              $('#time').val('');

              $('#group-modal').modal('hide');
            }
        },
        error: function(response) {
          $('#dateError').text(response.responseJSON.errors.date);
          $('#timeError').text(response.responseJSON.errors.time);
        }
      });
  }

  function deleteGroup(event) {
    var id  = $(event).data("id");
    let _url = `/groups/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: 'DELETE',
        data: {
          _token: _token
        },
        success: function(response) {
          $("#row_"+id).remove();
        }
      });
  }
</script>
</script>
  @yield('javascript')

</html>
