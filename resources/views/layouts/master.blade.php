<!-- Stored in resources/views/layouts/master.blade.php -->

<html>
<head>
    <title>Manifesto - @yield('title')</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    {!! HTML::style('css/main.css') !!}
</head>
<body>
<header>
    <div class="bar social_bar">
        <div class="pull-left">
            <i class="fa fa-facebook fa-2x social_logo"></i>
            <i class="seperator_left"></i>
            <i class="fa fa-twitter fa-2x social_logo"></i>
            <i class="seperator_left"></i>
            <i class="fa fa-flickr fa-2x social_logo"></i>
            <i class="seperator_left"></i>
            <i class="fa fa-spotify fa-2x social_logo"></i>
        </div>
        <div class="pull-right">
            <i class="fa fa-paper-plane fa-2x social_logo"></i><span class="header_font">Abonneer</span>
            <i class="seperator_left"></i>
            <i class="fa fa-envelope fa-2x social_logo"></i><span class="header_font">Mail</span>
        </div>
    </div>
</header>
<div class="nav_bar">
    <div class="manifesto_logo">
        {!! HTML::image('images/logo/manifesto_logo.png', 'manifesto_logo', array('class' => 'manifesto-logo')) !!}
        <div class="nav pull-right pull-bottom">
            <ul>
                <li class="home"><a class="@yield('home')" href="/">Home</a></li>
                <li class="tutorials"><a class="@yield('agenda')" href="agenda">Agenda</a></li>
                <li class="about"><a class="@yield('nieuws')" href="#">Nieuws</a></li>
                <li class="news"><a class="@yield('informatie')" href="#">Informatie</a></li>
                <li class="contact"><a class="@yield('fotoalbum')" href="#">Fotoalbum</a></li>
                <li class="contact"><a class="@yield('contact')" href="#">Contact</a></li>
            </ul>
        </div>
    </div>

</div>

@section('navigation')

@show
<div class="main_container">
    @yield('content')
</div>
</body>
<footer>
    <div></div>
</footer>
</html>