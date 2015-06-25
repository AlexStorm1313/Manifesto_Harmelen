<!-- Stored in resources/views/layouts/master.blade.php -->

<html>
<head>
    <title>Manifesto - @yield('title')</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    {!! HTML::style('css/main.css') !!}
    {!! Html::style('css/bootstrap-datetimepicker.css')!!}
    {!! Html::script('js/bootstrap-datetimepicker.js')!!}
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
                @if(Auth::check() === false)
                    <li class="home"><a class="@yield('home')" href="/">Home</a></li>
                    <li class="agenda"><a class="@yield('agenda')" href="/agenda">Agenda</a></li>
                    <li class="abonnement"><a class="@yield('abonnement')" href="/abonnement">Abonnementen</a></li>
                    <li class="about"><a class="@yield('nieuws')" href="#">Nieuws</a></li>
                    <li class="news"><a class="@yield('informatie')" href="#">Informatie</a></li>
                    <li class="fotoalbum"><a class="@yield('fotoalbum')" href="#">Fotoalbum</a></li>
                    <li class="contact"><a class="@yield('contact')" href="#">Contact</a></li>
                @endif
                @if(Auth::check())
                    <li class="contact"><a class="@yield('home')" href="/admin_home">Home</a></li>
                    <li class="contact"><a class="@yield('event')" href="/events_show">Events</a></li>
                    <li class="contact"><a class="@yield('maintenance')" href="/maintenance">Maintenance</a></li>
                    <li class="contact"><a class="" href="/account">Account</a></li>
                    <li class="contact"><a class="" href="/logout">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>

</div>

<div class="page_header">
    <div class="page_header_text">@yield('page_header')</div>
</div>
<div class="main_container">
    @yield('content')
</div>
</body>
<footer>
    <div></div>
</footer>
</html>