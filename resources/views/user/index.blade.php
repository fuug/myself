@extends('layouts.main')
@section('title', 'Личный кабинет')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/user_account.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/calendar.css') }}">
@endsection

@section('footer')
    <script src="{{ asset('js/calendar.js') }}"></script>

    <script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
    <script src="{{ asset('plugins/fullcalendar/locales/ru.js') }}"></script>
@endsection


@section('content')
    <div class="main">
        <div class="d-flex">
            <div class="sidebar">
                <div class="user-info">
                    <div class="thumb">
                        <img src="{{ url( 'storage/' . auth()->user()->thumbnail) }}" alt="User photo">
                    </div>
                    <div class="name">{{ $user->name }}</div>
                    <div class="about">
                        @foreach($user->categories as $category)
                            <span>{{ $category->title }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="sidebar-nav">
                    <ul>
                        <li class="nav-li">
                            <i class="nav-icon icon-edit-info"></i>
                            <p>Редактировать информацию</p>
                        </li>
                        <li class="nav-li">
                            <i class="nav-icon icon-edit"></i>
                            <p>Редактировать график</p>
                        </li>
                        <li class="nav-li">
                            <i class="nav-icon icon-chat"></i>
                            <p>Чат</p>
                        </li>
                        <li class="nav-li">
                            <i class="nav-icon icon-consultation"></i>
                            <p>Кабинет консультаций</p>
                        </li>
                        <li class="nav-li">
                            <i class="nav-icon icon-clients"></i>
                            <p>Список клиентов</p>
                        </li>
                        <li class="nav-li">
                            <i class="nav-icon icon-material"></i>
                            <p>Методические материалы</p>
                        </li>
                        <li class="nav-li">
                            <p>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Выход
                                </a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="calendar"></div>
        </div>
    </div>
    <form id="logout-form" style="position: absolute" action="{{ route('logout') }}" method="POST"
          class="d-none">
        @csrf
    </form>
@endsection

@include('user.calendar')
