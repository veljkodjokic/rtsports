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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body style="background-color: #231F20">
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
                    <a class="navbar-brand" href="{{ url('/') }}" style="width: 60%">
                        <img src="pics/bez_pozadine_real.png" style="width: 100%; height: 100%;" />
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
                            <li><a href="channels">Channels</a></li>

                            <li><a href="schedule">Schedule</a></li>

                            <li><a href="contact">Contact us</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/account">
                                            My account
                                        </a>

                                        <a href="/subscriptions">
                                            My subscriptions
                                        </a>

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
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Channel 3</div>

                <div class="panel-body" style="height:90%">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <video id="video" width="100%" height="50%" controls>
                        <source src="https://www.rtsportsbackend.work/hls/stream2.m3u8" type="application/x-mpegURL">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

<script>
  if(Hls.isSupported()) {
    var video = document.getElementById('video');
    var hls = new Hls();
    hls.loadSource('https://www.rtsportsbackend.work/hls/stream2.m3u8');
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED,function() {
      video.play();
  });
 }
</script>
</div>

    <!-- Scripts -->
    
</body>
</html>