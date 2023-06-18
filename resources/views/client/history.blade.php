<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <title>Страница история бронирования</title>
</head>
<body>
<!--history page-->
<div class="wrapper">
    @include('components.header')
    @include('components.notification')
    <main class="main">
        <div class="history">
            <div class="container">
                <div class="grid f1f3">
                    <div class="sidebars vertical g20">
                        <div class="card sticky vertical g20">
                            <div class="grid f2">
                                <h4 class="mini">ID бронирования: </h4>
                                <div class="price-number gray">
                                    {{$booking->id}}
                                </div>
                            </div>
                            <div class="grid f2">
                                <h4 class="mini">Стоимость бронирования: </h4>
                                <h3 class="price-number purple bold">
                                    {{$booking->price}} ₽
                                </h3>
                            </div>

                        </div>
                    </div>

                    <div class="grid f2 g40">
                        @foreach($booking->cars as $car)
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
                                    <div class="flex g10 mb15">
                                        <div class="date-box">
                                            {{$booking->date_from}}
                                        </div>
                                        <svg class="little-icon" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 448 512">
                                            <path
                                                d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"/>
                                        </svg>
                                        <div class="date-box">
                                            {{$booking->date_to}}
                                        </div>
                                    </div>
                                    <div class="flex g10">
                                        <div class="bold">Филиал:</div>
                                        <div class="value">{{$car->branch->name}}</div>
                                    </div>
                                    <div class="flex g10">
                                        <div class="bold">Номер:</div>
                                        <div class="value">{{$car->number}}</div>
                                    </div>
                                    <div class="flex g10">
                                        <div class="bold">Марка автомобиля:</div>
                                        <div class="value">{{$car->model}}</div>
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
    </main>
    @include('components.footer')
</div>
</body>
</html>
