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

    @if(auth()->user() === null)
        @if(Illuminate\Support\Facades\Cookie::get('timezone') === null)
            <link rel="stylesheet" href="{{ asset('css/select2.client.min.css') }}">
        @endif
    @endif


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
            <li><a href="/#advantages">Преимущества</a></li>
            @guest
                <li><a href="{{ url('login') }}">Вход</a></li>
            @else
                <li>
                    <div class="user">
                        <div class="user-thumb"><img src="{{ url( 'storage/' . auth()->user()->thumbnail) }}"
                                                     alt="user photo"></div>
                        <div class="user-name"><span><a
                                    href="{{ route('user.profile.index', auth()->user()->id) }}">{{ auth()->user()->name }}</a></span>
                        </div>
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


@if(auth()->user() === null)
    @if(Illuminate\Support\Facades\Cookie::get('currency_id') === null)
        @include('main.includes.currencyModal')
    @endif

    @if(Illuminate\Support\Facades\Cookie::get('timezone') === null)
        @include('main.includes.timezoneModal')
    @endif

    @if(Illuminate\Support\Facades\Cookie::get('privacy') === null)
        @include('main.includes.privacyModal')
    @endif

    @if(Illuminate\Support\Facades\Cookie::get('show_urgency') === null)
        @include('main.includes.urgencyModal')
    @endif
@else
    @if(auth()->user()->timezone === null)
        @include('main.includes.timezoneModal')
    @endif
    @if(auth()->user()->currency_id === null)
        @include('main.includes.currencyModal')
    @endif
    @if(auth()->user()->privacy === null || auth()->user()->privacy === false)
        @include('main.includes.privacyModal')
    @endif
    @if(auth()->user()->show_urgency === null || auth()->user()->show_urgency === true)
        @include('main.includes.urgencyModal')
    @endif
@endif



</body>
</html>
