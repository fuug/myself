@extends('layouts.main')

@section('title', 'MySelf - Авторизация')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/login.css') }}">
@endsection

@section('content')

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
                    <div id="register" class="tab tab-register">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="input-form">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-form">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-form">
                                <input id="password" type="password"
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
@endsection




@section('footer')
    <script src="js/index.js"></script>
@endsection
