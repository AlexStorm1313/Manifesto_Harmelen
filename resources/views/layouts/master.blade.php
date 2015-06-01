<!-- Stored in resources/views/layouts/master.blade.php -->

<html>
<head>
    <title>Manifesto - @yield('title')</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
@section('header')

@show

@section('navigation')

@show

<div class="container">
    @yield('content')
</div>
</body>
</html>