@extends('layouts.main')

@section('title', $performer->name)

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/index.css') }}">
@endsection

@section('content')
{{ $performer->getMinimumPrice() }}
@endsection

@section('footer')

@endsection

