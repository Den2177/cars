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
                @if(count($bookings))
                    <div class="grid f2">
                        @foreach($bookings as $booking)
                            <a href="{{route('history', $booking->id)}}" class="card onhover pointer block">
                                <div class="vertical g10">
                                    <div class="flex sb">
                                        <h3>#{{$booking->id}}</h3>
                                        <h3>{{$booking->price}} руб.</h3>
                                    </div>
                                    <div class="text">Забронировано машин: {{$booking->cars->count()}}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="card">Вы пока не сделали ни одного бронирования</div>
                @endif
            </div>
        </div>
    </main>
    @include('components.footer')
</div>
</body>
</html>
