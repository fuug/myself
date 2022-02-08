@extends('layouts.main')
@section('title', 'Личный кабинет')

@section('styles')

@endsection

@section('footer')

@endsection


@section('content')

    @foreach($subscriptions as $subscription)
        Абонемент на {{ $subscription->session_count }} консультаций у {{ \App\Models\User::all()->where('id', $subscription->performer_id)->first()->name }}
        <a href="{{ route('user.profile.sessionUpdate', [$user, $subscription]) }}">Погасить</a>
    @endforeach

@endsection
