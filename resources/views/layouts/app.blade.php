<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/89c132bd15.js" crossorigin="anonymous"></script>



    <link href="/css/tailwind.css" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Alpha Films', 'Alpha Films') }}</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

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


    <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

  <!-- jQuery custom scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  <!-- jQuery CDN - Slim version (=without AJAX) -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <!-- Popper.JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/user/home') }}">
                    {{ config('Alpha Films', 'Alpha Films') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="content">

                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">

                            {{-- <button type="button" id="sidebarCollapse" class="btn btn-info">
                                <i class="fas fa-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button> --}}
                        </div>
                    </nav>
                </div>

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
                            <a class="nav-link topspace2" href="{{ route('about') }}">{{ __('About') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link topspace2" href="{{ route('user.catalogue') }}">{{ __('Catalogue') }}</a>
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
                                    Home
                                </a>

                                <a class="dropdown-item" href="{{ route('user.profile') }}">
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
<footer>
  <div class="row">
      <div class="col-md-4">
          <p class="topspace">copyright</p>
          <h5><i class="fab fa-linkedin-in"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-pinterest-p"></i></h5>

      </div>
      <div class="col-md-4">
          <h4 class="topspace2">About us</h4>
          <p>IN ADDITION to sustainable social change, we believe passionately in travel, naps, good food, great friends, long talks, broadened horizons + a spirit of adventure.</p>
      </div>
      <div class="col-md-4">
          <h4 class="topspace2">Contact Us</h4>
          <p>Freephone: 0976846352</p>
          <p>123 Foxrock Avenue <br> Dun Laoghaire <br> Ireland</p>
      </div>


  </div>
</footer>

<script>

AOS.init();


    setTimeout(function() {
        $('.flash').alert('close')
    }, 3000);


    // $('#laravel_crud').DataTable();

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
