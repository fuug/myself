@extends('layouts.main')
@section('title', 'Оплата')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/payment.css') }} ">
@endsection

@section('footer')
    <script>
        $(document).ready(function () {
            let currentYear = $('#year').val();
            const lastYear = +currentYear + 5;
            for(let i = currentYear; i < lastYear; i++) {
                $('#year').prepend('<option value="' + i + '">' + i + '</option>');
            }
        })
    </script>
@endsection

@section('content')
    <div class="main">

        <div class="section-title">
            <h1>Укажите ваши банковские данные</h1>
        </div>

        <div class="all">
            <div class="filters ">

                <div class="select-control">
                    <p class="indent">Введите номер карты</p>
                    <input class="card-inf size-num-card" placeholder="0000 0000 0000 0000" maxlength="16">
                </div>

                <div class="select-control">
                    <div class="text-cvc d-flex">
                        <p>Срок действия карты</p>
                        <p class="card-inf_consultation">CVC2/CVV2</p>
                    </div>
                    <div class="text-cvc d-flex ">
                        <select name="year" id="year">
                            <option selected value="{{ \Carbon\Carbon::now()->year }}">{{ \Carbon\Carbon::now()->year }}</option>
                        </select>
                        <select name="month" id="month">
                            <option selected value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <input class="card-inf size-cvc" maxlength="3">
                    </div>
                </div>

                <div class="select-control">
                    <p class="card-inf_consultation indent">Введите имя владельца карты</p>
                    <div>
                        <input class="card-inf size-name">
                    </div>
                </div>

            </div>
            <div class="end">
                <span>Пополнение счёта: <b>9562 9562 9562</b></span>
                <span>Итого: <b>200$</b></span>
                <button class="btn-primary">Оплатить</button>
            </div>

        </div>
    </div>
@endsection
