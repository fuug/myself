@extends('layouts.main')
@section('title', 'Оформление заказа')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/checkout.css') }}">
@endsection

@section('footer')
    <script>
        $('#countSession').change(function () {
            const totalPrice = $('#countSession option:selected').val() == 0 ? "{{ auth()->user() !== null ? auth()->user()->convertAmount($pricePerOne) : $pricePerOne }}" : $('#countSession option:selected').data('price')
            $('#totalSum').text(totalPrice + ' {{ auth()->user() !== null ? auth()->user()->getCurrencyTitle() : ' $' }}')
            $('#hiddenSum').val(totalPrice)
            $('#subscription_id').val($('#countSession option:selected').val())
        })
    </script>
@endsection

@section('content')
    <div class="main">

        <div class="section-title">
            <h1>Оформление заказа</h1>
        </div>

        <div class="filters d-flex">
            <div class="select-control w-25">
                <label for="performers">Психолог</label>
                <input type="text" name="performers" id="performers" disabled value="{{ $currentPerformer->name }}">
            </div>
            <div class="select-control w-40">
                <label for="countSession">Количество консультаций</label>
                <select name="countSession" id="countSession">
                    <option value="default" selected disabled>Количество консультаций</option>
                    <option value="0" data-count="1">Одна консультация</option>
                    @foreach($subscriptions as $subscription)
                        @if(auth()->user() !== null)
                            <option value="{{ $subscription->id }}" data-count="{{ $subscription->session_count }}"
                                    data-price="{{ auth()->user()->convertAmount($subscription->price) }}">
                                Абонемент {{ $subscription->session_count }} консультаций
                            </option>
                        @else
                            <option value="{{ $subscription->id }}" data-price="{{ $subscription->price }}"
                                    data-count="{{ $subscription->session_count }}">
                                Абонемент {{ $subscription->session_count }} консультаций
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="select-control w-25">
                <label for="price">Стоимость за 1 консультацию</label>
                @if(auth()->user() !== null)
                    <input type="text" name="price" id="price" disabled
                           value="{{ auth()->user()->echoAmount($pricePerOne) }}">
                @else
                    <input type="text" name="price" id="price" disabled value="{{ $pricePerOne }}$">
                @endif

            </div>
        </div>

        <div class="total">
            <span>Итого: <b id="totalSum"></b> </span>
            <form action="{{ route('performer.checkout.payment', $currentPerformer->id) }}" method="POST">
                @csrf
                <input type="hidden" name="performer_id" id="performer_id" value="{{ $currentPerformer->id }}">
                <input type="hidden" name="subscription_id" id="subscription_id" value="">
                <input type="hidden" name="hiddenSum" id="hiddenSum" value="">
                <button class="btn btn-primary">Оплатить</button>
            </form>
        </div>
    </div>


@endsection
