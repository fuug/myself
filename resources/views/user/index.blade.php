@extends('layouts.main')
@section('title', 'Личный кабинет')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/user_account.css') }}" xmlns="">
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/calendar.css') }}">
@endsection

@section('footer')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('#timeZoneSelect').select2()
        });
    </script>
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
                @if($user->role->title == 'performer')
                    @include('user.includes.performerSidebar')
                @else
                    @include('user.includes.userSidebar')
                @endif
            </div>

            <div id="calendar"></div>
        </div>
    </div>
    <form id="logout-form" style="position: absolute" action="{{ route('logout') }}" method="POST"
          class="d-none">
        @csrf
    </form>


    <div id="addEventModal" class="modal">
        <div class="modalContent">
            <div class="closeModal">
                <button type="button" class="close" onclick="$('#addEventModal').fadeOut()">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modalBody">
                <h1>Укажите время</h1>
                <form action="{{ route('user.profile.addSession', $user->id) }}" method="POST">
                    @csrf
                    <div class="d-flex">
                        <div class="col-2">
                            <label for="start">Время начала</label>
                            <input type="time" name="start" id="start">
                        </div>
                        <div class="col-2">
                            <label for="end">Время окончания</label>
                            <input type="time" name="end" id="end">
                        </div>
                    </div>
                    <input type="hidden" id="date" name="date">
                    <button class="btn btn-primary" type="submit">Создать</button>
                </form>
            </div>
        </div>
    </div>

    <div id="changeEventModal" class="modal">
        <div class="modalContent">
            <div class="closeModal">
                <button type="button" class="close" onclick="$('#addEventModal').fadeOut()">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modalBody">
                <h1>Удалить запись?</h1>
                <form action="{{ route('user.profile.deleteSession', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="eventId" name="eventId">
                    <button class="btn btn-primary" type="submit">Удалить</button>
                </form>
            </div>
        </div>
    </div>

    <div id="timeZone" class="modal">
        <div class="modalContent">
            <div class="closeModal">
                <button type="button" class="close" onclick="$('#timeZone').fadeOut()">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modalBody">
                <div class="form-select">
                    <label for="timeZoneSelect">Ваш часовой пояс</label>
                    <select name="timeZoneSelect" id="timeZoneSelect" style="width:100%;" class="select2 select2-hidden-accessible"
                            data-select2-id="1"
                            tabindex="-1" aria-hidden="true">
                        @foreach($timeZoneList as $timeZone => $timezone_gmt_diff)
                            <option value="{{ $timeZone }}">{{ $timezone_gmt_diff }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    @include('user.calendar')
@endsection

