<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Myself | Авторизация</title>


    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap&subset=cyrillic-ext"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yantramanav:wght@700&display=swapsubset=cyrillic-ext"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300;400;700&family=Yantramanav:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('sass/style.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/login.css') }}">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>

<div class="d-flex justify-content-space-between">
    <div class="col-2 bg-primary ">
        <div class="width-80">
            <div class="header">
                <ul class="d-flex list-style-none tab-list">
                    <li class="li-auth focus" onclick="showModal('auth')">Вход</li>
                    <li class="li-register" onclick="showModal('register')">Регистрация</li>
                </ul>
            </div>
            <div class="tabs">
                <div id="auth" class="tab tab-auth">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="input-form">
                            <input id="email" type="email" class="enter" name="email" value="{{ old('email') }}"
                                   required
                                   autocomplete="email" autofocus placeholder="Логин">
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>Неверный E-mail</strong>
                                </span>
                        @enderror

                        <div class="input-form">
                            <input id="password" type="password" class="enter" name="password" placeholder="Пароль"
                                   required
                                   autocomplete="current-password">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>Неверный пароль</strong>
                            </span>
                        @enderror

                        <div class="forgot">
                            <div>
                                <input type="checkbox" class="checkbox_input" id="form-check-label">
                                <label class="checkbox__label" for="form-check-label">Запомнить меня</label>
                            </div>
                            <div class="form-check-label-container">
                                <label class="form-check-label1">Забыли пароль?</label>
                            </div>
                        </div>

                        <button type="submit" class="btn-primary">Вход</button>

                        <div class="login-with-some">
                            <p class="login-with">Войти с помощью</p>
                            <ul class="d-flex list-style-none">
                                <li><a href="{{ route('fb.auth') }}" target="_blank"><i
                                            class="icon-facebook"></i></a></li>
                                <li><a href="{{ route('tg.auth') }}" target="_blank"><i
                                            class="icon-telegram"></i></a></li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div id="register" class="tab tab-register">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-form">
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror" placeholder="Ваше имя"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-form">
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" placeholder="Ваш email"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-form">
                            <input id="password" type="password" placeholder="Ваш пароль"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-form">
                            <input id="password-confirm" type="password" class="form-control"
                                   placeholder="Подтверждение пароля"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn-primary">Регистрация</button>
                        <div class="login-with-some">
                            <p class="login-with">Зарегистрироваться с помощью</p>
                            <ul class="d-flex list-style-none">
                                <li><a href="#" target="_blank"><i class="icon-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="icon-telegram"></i></a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2 banner">
        <div class="logo">
            <img alt="logo" src="img/logo.svg">
        </div>
        <div class="img-banner">
            <img class="main-banner" alt="psychotherapist" src="img/mainImage.png">
        </div>
    </div>
</div>

<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
