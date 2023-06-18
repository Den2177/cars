<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <title>Страница регистрации в личный кабинет</title>
</head>
<body>
<!--register page-->
@include('components.notification')
<div class="auth">
    <form action="{{route('register')}}" method="post" class="card form">
        @csrf
        <h3 class="center">Регистрация</h3>
        <div class="vertical g20">
            <label class="vertical g5">
                <div class="hint">
                    Имя
                </div>
                <input type="text" class="input" name="first_name">
            </label>
            <label class="vertical g5">
                <div class="hint">
                    Фамилия
                </div>
                <input type="text" class="input" name="last_name">
            </label>
            <label class="vertical g5">
                <div class="hint">
                    Отчество
                </div>
                <input type="text" class="input" name="middle_name">
            </label>
            <label class="vertical g5">
                <div class="hint">
                    Телефон
                </div>
                <input type="text" class="input" name="phone">
            </label>
            <label class="vertical g5">
                <div class="hint">
                    Дата рождения
                </div>
                <input type="date" class="input" name="birth_date">
            </label>
            <label class="vertical g5">
                <div class="hint">
                    Пароль
                </div>
                <input type="password" class="input" name="password">
            </label>
            <label class="vertical g5">
                <div class="hint">
                    Повтор пароля
                </div>
                <input type="password" class="input" name="password_confirmation">
            </label>
            <button class="btn auth-btn mt20" type="submit">Зарегистрироваться</button>
            <a href="{{route('home')}}" class="link center">Или на главную</a>
        </div>
    </form>
</div>
</body>
</html>
