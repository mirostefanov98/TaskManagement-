<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TaskManagement</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link href="{{asset('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- Bootstrap core JavaScript -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.js"
      integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
      crossorigin="anonymous"></script>
    <script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{route('welcome')}}">TaskManagement</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{route('projects')}}">Projects</a>
            </li>
            @if(Auth::user()->is_admin == 1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('other_projects')}}">Projects of other users</a>
            </li><li class="nav-item">
              <a class="nav-link" href="{{route('users_list')}}">Users</a>
            </li>
            @endif
            @endauth
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest            
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>

</html>
