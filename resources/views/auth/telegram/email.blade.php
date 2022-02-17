<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap&subset=cyrillic-ext"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yantramanav:wght@700&display=swapsubset=cyrillic-ext"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300;400;700&family=Yantramanav:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('sass/need_mail.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/style.css') }}">

    <title>Не хватает почты</title>

</head>
<body>
<div class="main">
    <form action="{{ route('tg.email') }}" method="post">
        @csrf
        <h1>Не хватает почты</h1>
        <div class="mt-2">
            <input type="email" name="user_email" id="email" placeholder="Ваш email">
        </div>
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="user_nickname" value="{{ $user->nickname }}">
        <input type="hidden" name="user_name" value="{{ $user->name }}">
        <button class="btn btn-primary mt-2" type="submit">Отправить</button>
    </form>
</div>
</body>
</html>
