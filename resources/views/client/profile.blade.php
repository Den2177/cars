<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <title>Страница личного кабинета</title>
</head>
<body>
<!--profile page-->
<div class="wrapper">
    @include('components.header')
    @include('components.notification')
    <main class="main">
        <div class="profile">
            <div class="container">
                <div class="grid f1f3">
                    <div class="sidebars vertical g20">
                        <div class="card vertical g20 sticky">
                            <h3 class="center">{{$user->first_name}} {{$user->last_name}} {{$user->middle_name}}</h3>
                            <div class="grid f2">
                                <a href="{{route('cards')}}" class="counter-block block">
                                    <div class="big-number">
                                        {{$user->cards->count()}}
                                    </div>
                                    <div class="counter-message center mt10">
                                        Банковских карт
                                    </div>
                                </a>
                                <a href="{{route('history.list')}}" class="counter-block block">
                                    <div class="big-number">
                                        {{$user->bookings->count()}}
                                    </div>
                                    <div class="counter-message center mt10">
                                        Бронирований
                                    </div>
                                </a>
                            </div>
                            <div class="vertical g10 mt20">
                                <a href="{{route('cards')}}" class="btn">Банковские карты</a>
                                <a href="{{route('logout')}}" class="btn reverse">Выйти</a>
                            </div>

                        </div>
                    </div>
                    <div class="data vertical g20">
                        <div class="booking-items grid f2 g40">
                            @foreach($cars as $car)
                                <div class="card booking-item">
                                    <div class="grid f3f1">
                                        <div class="contain-image">
                                            <img src="{{$car->image}}"
                                                 alt="image">
                                        </div>
                                        <div class="vertical">
                                            <h3 class="center">{{$car->model}}</h3>
                                        </div>
                                    </div>
                                    <div class="vertical g10 mt20">
                                        <div class="flex g10">
                                            <div class="bold">Выбранный филиал:</div>
                                            <div class="value">{{$car->branch->name}}</div>
                                        </div>
                                        <div class="flex g10">
                                            <div class="bold">Номер машины:</div>
                                            <div class="value">{{$car->number}}</div>
                                        </div>
                                        <div class="flex g10">
                                            <div class="bold">Марка:</div>
                                            <div class="value">{{$car->model}}</div>
                                        </div>
                                        <div class="text">
                                            {{$car->description}}
                                        </div>
                                        <div class="flex sb aic mt20">
                                            <div></div>
                                            <div class="price-box">
                                                <h3>{{$car->priceForSession}} ₽</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('components.footer')
</div>
</body>
</html>
