@extends('layouts.main')
@section('title', 'Список клиентов')

@section('styles')
    <script src="https://kit.fontawesome.com/5cc1363b4b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('sass/chat.css') }}">
@endsection

@section('footer')
@endsection


@section('content')
    <div class="main">
        <div class="d-flex">
            <div class="sidebar">
                @foreach($users as $user_as_list)
                    <div class="d-flex item">
                        <div class="thumbnail">
                            <img src="{{ url( 'storage/' . $user_as_list->thumbnail) }}" alt="User photo">
                        </div>
                        <a href="{{ route('user.profile.chats.chat', [$user->id, $user_as_list->id]) }}">
                            <div>
                                <span>{{ $user_as_list->name }}</span>
                                <span>{{ $user_as_list->getChatWith($user->id)->getLastMessage()['created_at'] }}</span>
                            </div>
                            <div>{{ $user_as_list->getChatWith($user->id)->getLastMessage()['text']}}</div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="center">
            </div>
        </div>
    </div>

@endsection

