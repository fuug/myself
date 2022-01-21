<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Myself | @yield('title')</title>


    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap&subset=cyrillic-ext"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yantramanav:wght@700&display=swapsubset=cyrillic-ext"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300;400;700&family=Yantramanav:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('sass/style.css') }}">
    @hasSection('styles')
        @yield('styles')
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <nav>
        <ul class="nav d-flex">
            <li><a href="/"><img class="logo" alt="logo" src="{{ asset('img/logo.svg')}}"></a></li>
            <li><a href="{{ route('performers.list') }}">Наши психологи</a></li>
            @guest
                <li><a href="{{ url('login') }}">Вход</a></li>
            @else
                <li>
                    <div class="user">
                        <div class="user-thumb"><img src="{{ url( 'storage/' . auth()->user()->thumbnail) }}" alt="user photo"></div>
                        <div class="user-name"><span><a href="{{ route('user.profile.index', auth()->user()->id) }}">{{ auth()->user()->name }}</a></span></div>
                    </div>
                </li>
            @endif

        </ul>
    </nav>
</header>

@hasSection('content')
    @yield('content')
@endif

@hasSection('footer')
    @yield('footer')
@endif

</body>
</html>
