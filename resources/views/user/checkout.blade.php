@extends('layouts.main')
@section('title', 'Оформление заказа')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/checkout.css') }}">
@endsection

@section('footer')
    <script>
        $('#countSession').change(function () {
            const totalOutput = $('#totalSum');
            const session_count = $('#countSession option:selected').data('count');
            const price = $('#price').val().slice(0, -1);
            const totalPrice = session_count * price;
            totalOutput.text(totalPrice + '$')
            $('#hiddenSum').val(totalPrice)
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
                        <option value="{{ $subscription->id }}" data-count="{{ $subscription->session_count }}">
                            Абонемент {{ $subscription->session_count }} консультаций
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="select-control w-25">
                <label for="price">Стоимость за 1 консультацию</label>
                <input type="text" name="price" id="price" disabled value="{{ $pricePerOne }}$">
            </div>
        </div>

        <div class="total">
            <span>Итого: <b id="totalSum">0$</b> </span>
            <form action="{{ route('performer.checkout.payment', $currentPerformer->id) }}" method="GET">
                @csrf
                <input type="hidden" id="hiddenSum" value="">
                <button class="btn-primary">Оплатить</button>
            </form>
        </div>
    </div>


@endsection
