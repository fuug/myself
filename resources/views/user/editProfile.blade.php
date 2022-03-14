@extends('layouts.main')
@section('title', 'Список клиентов')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/user_account.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/customer_list.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.client.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/editprofile.css') }}">
    <script src="https://kit.fontawesome.com/5cc1363b4b.js" crossorigin="anonymous"></script>
@endsection

@section('footer')
    <script src="{{ asset('js/select2.full.js') }}"></script>

    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
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

            <div class="center">
                <form action="{{ route('user.profile.edit.save', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-input">
                        <label for="surname">Фамилия</label>
                        <div class="input-border">
                            <input type="text" id="surname" name="surname" value="{{ $user->surname() }}">
                        </div>
                    </div>
                    <div class="form-input">
                        <label for="firstname">Имя</label>
                        <div class="input-border">
                            <input type="text" id="firstname" name="firstname" value="{{ $user->firstname() }}">
                        </div>
                    </div>
                    <div class="form-input">
                        <label for="email">Email</label>
                        <div class="input-border">
                            <input type="text" id="email" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-input">
                        <label for="timezone">Часовой пояс</label>
                        <div class="input-border">
                            <select id="timezone" name="timezone"
                                    class="select2 select2-hidden-accessible"
                                    data-placeholder="Выберите категории" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                @foreach($timeZoneList as $timeZone => $timezone_gmt_diff)
                                    <option
                                        value="{{ $timeZone }}" {{ $user->timezone == $timeZone ? 'selected' : '' }}>
                                        {{ $timezone_gmt_diff }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-input">
                        <label for="timezone">Валюта</label>
                        <div class="input-border">
                            <select name="currency_id" id="currency_id">
                                @foreach(\App\Models\Currency::all() as $currency)
                                    <option
                                        value="{{ $currency->id }}" {{ $user->currency_id == $currency->id ? 'selected' : '' }}>{{ $currency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if($user->role->title == 'performer')
                        @include('user.includes.editPerformer')
                    @endif

                    <div class="button-group">
                        <button class="btn btn-primary">Сохранить изменения</button>
                        <a href="{{ route('user.profile.index', $user->id) }}" class="btn btn-secondary">Отменить</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

