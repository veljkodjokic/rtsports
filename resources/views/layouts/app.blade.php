<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials/favicon')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property=og:title content=RTSports>
    <meta property=og:url content=https://www.rtsports.us>
    <meta property=og:type content=website>
    <meta property=og:description content='The best Real-Time Sports platform out there! '>
    <meta property=og:image content='https://rtsports.us/pics/samo logo pez pozadine.png'>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js"></script>
    <script src="//code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.6/sweetalert2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.6/sweetalert2.min.css" rel="stylesheet">

</head>
<body style="background-color: #231F20;">
    <div id="app" >
        <nav class="navbar navbar-default navbar-static-top" style="background-color: #231F20;  border-color:#EC1A24;">
            <div class="container">
                <div class="navbar-header" style="width: 250px;">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}" style="width: 60%">
                        <img src="{{ asset('pics/bez_pozadine_real.png') }}" style="width: 100%; height: 100%;" />
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            @if(\Auth::user()->admin)
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" style="color: lime" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    ADMIN <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/auth_users">
                                            Auth Users
                                        </a>

                                        <a href="/admin/log_users">
                                            User logs
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif

                            <li><a class="fix-link" href="/channels">Channels</a></li>

                            <li><a class="fix-link" href="/news">News</a></li>

                            <li><a class="fix-link" href="/reports">Player Reports</a></li>

                            <li><a class="fix-link" href="/highlights">Videos&Highlights</a></li>

                            <li><a class="fix-link" href="/schedule">Schedule</a></li>

                            <li><a class="fix-link" href="/contact">Contact us</a></li>

                            <li><a class="fix-link" href="/FAQ">FAQ</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="fix-link" href="/account">
                                            My account
                                        </a>

                                        <a class="fix-link" href="/subscriptions">
                                            My subscriptions
                                        </a>

                                        <a class="fix-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session::has('err_$'))
        <script type="text/javascript">
                swal ( "Permission denied!" ,  "Please pay for a subscription" ,  "error" )
        </script>
        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
</body>
</html>
