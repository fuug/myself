@extends('layouts.main')

@section('title', 'MySelf - Авторизация')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/login.css') }}">
@endsection

@section('content')
    <section class="login-page">

        <div class="left">
            <div class="header">
                <div>
                    <p>Вход</p>
                    <hr size="6" color="#0292A3"/>
                </div>

                <p class="entrance">Регистрация</p>
            </div>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <input id="email" type="email" class="enter" name="email" value="{{ old('email') }}" required
                       autocomplete="email" autofocus placeholder="Логин">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>Неверный E-mail</strong>
                </span>
                @enderror

                <input id="password" type="password" class="enter" name="password"  placeholder="Пароль" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>Неверный пароль</strong>
                </span>
                @enderror


                <div class="forgot">
                    <div>
                        <input type="checkbox" class="checkbox__input" id="form-check-label">
                        <label class="checkbox__label" for="form-check-label">Запомнить меня</label>
                    </div>
                    <div class="form-check-label-container">
                        <label class="form-check-label1">Забыли пароль?</label>
                    </div>
                </div>

                <button type="submit" class="btn">Вход</button>
            </form>
            <section class="login-with-some">
                <div><p class="login-with">Войти с помощью</p></div>
                <img src="img/facebook.svg" class="facebook">
                <img src="img/telegram.svg">
            </section>
        </div>
        <div class="right">
            <img class="logo" alt="logo" src="img/logo.svg">
            <img class="main-banner" alt="psychotherapist" src="img/mainImage.png">
        </div>
    </section>
@endsection
