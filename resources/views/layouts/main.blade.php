<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap&subset=cyrillic-ext"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yantramanav:wght@700&display=swapsubset=cyrillic-ext"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300;400;700&family=Yantramanav:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Styles -->

    @hasSection('styles')
        @yield('styles')
    @endif
    <link rel="stylesheet" href="sass/style.css">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>

@hasSection('header')
    @yield('header')
@endif

@hasSection('content')
    @yield('content')
@endif

@hasSection('footer')
    @yield('footer')
@endif

</body>
</html>
