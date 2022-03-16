@extends('layouts.main')
@section('title', 'Подтвердите почту')
@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/verify.css') }}">
@endsection

@section('content')
    <div class="head">
        <h1>Подтвердите вашу почту</h1>
        <p>Письмо с подтверждением отправлено на почту: <b>{{ auth()->user()->email }}</b></p>
        <button id="show-modal">Изменить адрес электронной почты</button>
    </div>
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            Новое письмо отправлено на почту.
        </div>
    @endif
    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit"
                class="btn btn-primary">Отправить письмо ещё раз
        </button>
    </form>


    <div id="modalRestoreEmail" class="modal">
        <div class="modalContent">
            <div class="closeModal">
                <button type="button" class="close" onclick="$('#modalRestoreEmail').fadeOut()">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modalBody">
                <h1>Введите новый адрес электронной почты</h1>
                <form action="" id="new-email" method="POST">
                    @csrf
                    <div class="form-input">
                        <label for="email">Email</label>
                        <div class="input-border">
                            <input type="text" id="email" name="email" value="{{ auth()->user()->email }}">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                    <button class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>

    <div id="modalSuccess" class="modal">
        <div class="modalContent">
            <div class="closeModal">
                <button type="button" class="close" onclick="$('#modalSuccess').fadeOut()">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modalBody">
                <h1>Мы изменили ваш адрес</h1>
                <button class="btn btn-primary" onclick="$('#modalSuccess').fadeOut()" >Закрыть</button>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $('#show-modal').click(function () {
            $('#modalRestoreEmail').show()
        });

        $('#new-email').submit(function (e) {
            e.preventDefault()
            $.ajax({
                url: '{{ route('user.restoreEmail') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: $("form").serialize(),
                success: function (res) {
                    $('#modalRestoreEmail').hide()
                    $('#modalSuccess').show()
                }
            })
        })
    </script>
@endsection
