@extends('layouts.main')
@section('title', 'Список клиентов')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/user_account.css') }}" xmlns="">
    <link rel="stylesheet" href="{{ asset('sass/customer_list.css') }}" xmlns="">
@endsection

@section('footer')

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
                @foreach($customers as $customer)
                    <div class="item d-flex">
                        <div class="thumbnail">
                            <img src="{{ url( 'storage/' . $customer->thumbnail) }}" alt="user photo">
                        </div>
                        <div class="name">
                            <h2>{{ $customer->name }}</h2>
                            <a href="{{ route('user.profile.chats.chat', [$user->id, $customer->id]) }}">Написать</a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

