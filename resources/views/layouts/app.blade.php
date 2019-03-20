<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nutrisys') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Navbar includes -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/main.js')}}"></script>

    <!-- Navbar includes -->

</head>
<body>
    @guest
    @yield('content')
    @else

    <!--Nav bar-->
    <!--Nav bar-->
    <!--Nav bar-->
    <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="#">Welcome to Nutrisys</a>
            <div id="close-sidebar">
            <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
            <img class="img-responsive img-rounded" src="{{ asset('images/user.jpg')}}"
            alt="User picture">
            </div>
            <div class="user-info">
            <span class="user-name">{{ Auth::user()->first_name }}
                <strong>{{ Auth::user()->last_name }}</strong>
            </span>
            <span class="user-role">{{ Auth::user()->user_type }} user</span>
            <span class="user-status">
                <i class="fa fa-circle"></i>
                <span>Online</span>
            </span>
            </div>
        </div>
        <!-- sidebar-header  -->

        <!-- sidebar-search  -->
        <div class="sidebar-menu">
            <ul>
            <li class="header-menu">
                <span>General</span>
            </li>
            <li class="sidebar-dropdown">
                <a href="#">
                <i class="fa fa-tachometer-alt"></i>
                <span>Dashboard</span>
                <span class="badge badge-pill badge-danger">New</span>
                </a>
                <div class="sidebar-submenu">
                <ul>
                    <li>
                    <a href="{{route('home')}}">Overview
                        <span class="badge badge-pill badge-success">Pro</span>
                    </a>
                    </li>
                    <li>
                    <a href="{{route('calendar')}}">Calendar</a>
                    </li>
                </ul>
                </div>
            </li>
            <li class="sidebar-dropdown">
                <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Food</span>
                </a>
                <div class="sidebar-submenu">
                <ul>
                    <li>
                    <a href="{{route('log')}}">Log</a>
                    </li>
                    <li>
                    <a href="{{route('search')}}">Search</a>
                    </li>                
                    <li>
                    <a href="{{route('recipe')}}">Recipe</a>
                    </li>
                </ul>
                </div>
            </li>
            
            <li class="sidebar-dropdown">
                <a href="#">
                <i class="fa fa-chart-line"></i>
                <span>Goal</span>
                </a>
                <div class="sidebar-submenu">
                <ul>
                    <li>
                    <a href="{{route('goal')}}">Goals</a>
                    </li>
                    <li>
                    <a href="{{route('progress')}}">Progress</a>
                    </li>
                    <li>
                </ul>
                </div>
            </li>

            <li class="sidebar-dropdown">
                <a href="#">
                <i class="fa fa-user-circle"></i>
                <span>Profile</span>
                </a>
                <div class="sidebar-submenu">
                <ul>
                    <li>
                    <a href="{{route('profile')}}">Profile</a>
                    </li>
                    <li>
                    <a href="{{route('settings')}}">Settings</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                </div>
            </li>        
            </ul>
        </div>
        <!-- sidebar-menu  -->
        </div>
  </nav>

    <main class="page-content">
    @yield('content')
    </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

          <!--Nav bar-->
    <!--Nav bar-->
    <!--Nav bar-->
    @endguest

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>