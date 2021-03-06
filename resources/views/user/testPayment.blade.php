@extends('layouts.main')
@section('title', 'Оплата')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/payment.css') }} ">
@endsection

@section('footer')
{{--        <script src="https://checkout.cloudpayments.ru/checkout.js"></script>--}}
        <script src="https://widget.cloudpayments.ru/bundles/cloudpayments.js"></script>
{{--    <script id="widget-wfp-script" language="javascript" type="text/javascript" src="https://secure.wayforpay.com/server/pay-widget.js"></script>--}}
    <script>
        function pay_with_clouds() {
            const checkout = new cp.Checkout({
                publicId: 'test_api_000000000000000002',
                container: document.getElementById("pay-form")
            });

            const fieldValues = {
                cvv: '911',
                cardNumber: '4242 4242 4242 4242',
                expDateMonth: '12',
                expDateYear: '24',
            }

            checkout.createPaymentCryptogram()
                .then((cryptogram) => {
                    console.log(cryptogram);
                    fetch('https://api.cloudpayments.ru/payments/cards/charge', {
                        // mode: 'no-cors', // no-cors, *cors, same-origin
                        headers: {
                            // 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                        body: {
                            "Amount": '{{ $sum }}',
                            "Currency": "{{ $user->currency === null ? 'usd' : $user->currency->title }}",
                            "InvoiceId": "1234567",
                            "IpAddress": "123.123.123.123",
                            "Description": "Оплата товаров в myself-psy.com",
                            "AccountId": "user_x",
                            "Name": "CARDHOLDER NAME", // CardCryptogramPacket Обязательный параметр
                            "CardCryptogramPacket": cryptogram,
                            "Payer":
                                {
                                    "FirstName": "Тест",
                                    "LastName": "Тестов",
                                    "MiddleName": "Тестович",
                                    "Birth": "1955-02-24",
                                    "Address": "тестовый проезд дом тест",
                                    "Street": "Lenina",
                                    "City": "MO",
                                    "Country": "RU",
                                    "Phone": "123",
                                    "Postcode": "345"
                                }
                        }
                    }).then((response) => {
                        console.log(response);
                        return response.json();
                    }).then((data) => {
                        console.log(data);
                    });
                }).catch((errors) => {
                console.log(errors)
            });

        }

        function pay_with_clouds_widget() {
            const widget = new cp.CloudPayments();
            widget.pay('charge', // или 'charge'
                { //options
                    publicId: 'pk_9fe5782b644ae3e86403a1dd16309', //id из личного кабинета
                    description: 'Оплата абонемента', //назначение
                    amount: {{ $sum }}, //сумма
                    currency: '{{ $user->currency === null ? 'usd' : $user->currency->title }}', //валюта
                    skin: "mini",
                },
                {
                    onSuccess: function (options) {
                        // success
                        //действие при успешной оплате
                    },
                    onFail: function (reason, options) { // fail
                        //действие при неуспешной оплате
                    },
                    onComplete: function (paymentResult, options) {

                    }
                }
            )
        }

        function pay_with_wayforpay() {
            var wayforpay = new Wayforpay();
            wayforpay.run({
                    merchantAccount: "test_merch_n1",
                    merchantDomainName: "www.market.ua",
                    authorizationType: "SimpleSignature",
                    merchantSignature: "b95932786cbe243a76b014846b63fe92",
                    orderReference: "DH783023",
                    orderDate: "1415379863",
                    amount: "1547.36",
                    currency: "USD",
                    productName: "Процессор Intel Core i5-4670 3.4GHz",
                    productPrice: "1000",
                    productCount: "1",
                    clientFirstName: "Вася",
                    clientLastName: "Васечкин",
                    clientEmail: "some@mail.com",
                    clientPhone: "380631234567",
                    language: "RUS"
                },
                function (response) {
                    // on approved
                },
                function (response) {
                    // on declined
                },
                function (response) {
                    // on pending or in processing
                }
            );

        }

        function test_way_for_pay() {
            fetch('https://secure.wayforpay.com/pay', {
                mode: 'no-cors',
                method: 'POST',
                headers: {
                    // 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                body: {
                    "merchantAccount": "test_merchant",
                    "orderReference": "DH783023",
                    "merchantSignature": "",
                    "amount": 1547.36,
                    "currency": "UAH",
                    "authCode": "541963",
                    "email": "client@mail.ua",
                    "phone": "380501234567",
                    "createdDate": 12345678,
                    "processingDate": 12345678,
                    "cardPan": "41****8217",
                    "cardType": "visa",
                    "issuerBankCountry": "980",
                    "issuerBankName": "Privatbank",
                    "recToken": "",
                    "transactionStatus": "Approved",
                    "reason": "ok",
                    "reasonCode": "1100",
                    "fee": 0,
                    "paymentSystem": "card"
                }
            }).then((res) => {
                console.log(res);
            })
        }

    </script>
@endsection

@section('content')
    <div class="main">

        <div class="section-title">
            <h1>Укажите ваши банковские данные</h1>
        </div>

        <div class="all">
            <div id="pay-form" class="filters">

                <div class="select-control">
                    <p class="indent">Введите номер карты</p>
                    <input class="card-inf size-num-card" placeholder="0000 0000 0000 0000" maxlength="16"
                           data-cp="cardNumber">
                </div>

                <div class="select-control">
                    <div class="text-cvc d-flex">
                        <p>Срок действия карты</p>
                        <p class="card-inf_consultation">CVC2/CVV2</p>
                    </div>
                    <div class="text-cvc d-flex ">
                        <select id="year" data-cp="expDateYear">
                            <option selected
                                    value="{{ \Carbon\Carbon::now()->year }}">{{ \Carbon\Carbon::now()->year }}</option>
                        </select>
                        <select id="month" data-cp="expDateMonth">
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
                        <input class="card-inf size-cvc" maxlength="3" data-cp="cvv">
                    </div>
                </div>

                <div class="select-control">
                    <p class="card-inf_consultation indent">Введите имя владельца карты</p>
                    <div>
                        <input class="card-inf size-name" data-cp="name">
                    </div>
                </div>

            </div>
            <div class="end">
                @if(in_array($user->role->title, array('performer', 'admin')))
                    <span>Итого: <b>{{ $sum . ' (' . $sum / 2 . ') ' . $user->getCurrencyTitle() }}</b></span>
                @else
                    <span>Итого: <b>{{ $sum . ' ' . $user->getCurrencyTitle() }}</b></span>
                @endif
                {{--                <form action="{{ route('performer.checkout.done', [auth()->user(), $subscription_id]) }}" method="POST">--}}
                {{--                    @csrf--}}
                <button class="btn btn-primary" onclick="pay_with_clouds_widget()">pay_with_clouds_widget</button>
{{--                <button class="btn btn-primary" onclick="pay_with_clouds()">pay_with_clouds</button>--}}
{{--                <button class="btn btn-primary" onclick="test_way_for_pay()">pay_with_wayforpay</button>--}}
                {{--                </form>--}}
            </div>

        </div>
    </div>
@endsection
