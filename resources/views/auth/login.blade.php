<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <title>Страница входа в личный кабинет</title>
</head>
<body>
<!--login page-->
@include('components.notification')
<div class="auth">
    <form action="{{route('login')}}" method="post" class="card form">
        @csrf
        <h3 class="center">Вход</h3>
        <div class="vertical g20">
            <label class="vertical g5">
                <div class="hint">
                    Телефон
                </div>
                <input type="text" class="input" name="phone">
            </label>
            <label class="vertical g5">
                <div class="hint">
                    Пароль
                </div>
                <input type="password" class="input" name="password">
            </label>
            <button class="btn auth-btn mt20" type="submit">Войти</button>
            <a href="{{route('home')}}" class="link center">Или на главную</a>
        </div>
    </form>
</div>
</body>
</html>
