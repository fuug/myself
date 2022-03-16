@extends('layouts.main')
@section('title', 'Личный кабинет')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/subscriptions.css') }}">
@endsection

@section('content')
    <div class="main">
        @foreach($subscriptions as $subscription)
            Абонемент на {{ $subscription->session_count }} консультаций
            у {{ \App\Models\User::all()->where('id', $subscription->performer_id)->first()->name }}
            <a href="{{ route('user.profile.sessionUpdate', [$user, $subscription]) }}">Погасить</a>
        @endforeach
    </div>
@endsection
