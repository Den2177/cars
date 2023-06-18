<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <title>Страница бронирования</title>
</head>
<body>
<!--booking page-->
<div class="wrapper">
    @include('components.header')
    @include('components.notification')
    <main class="main">
        <div class="booking">
            <div class="container">
                <form action="{{route('bookings.store')}}" method="post" class="grid f1f3">
                    @csrf
                    <div class="sidebars vertical g20">
                        <div class="card vertical g20 sticky">
                            <div class="vertical g10">
                                <h4 class="mini">Финальная стоимость:</h4>
                                <div class="flex g5 aifs jcc">
                                    <h3 class="old-price center purple" id="new-price"></h3>
                                    <h3 class="old-price center" id="old-price">0 ₽</h3>
                                </div>
                            </div>
                            <input type="text" class="input hidden" name="price" id="all-price">
                            <select type="text" class="input hidden" name="cars[]" id="all-cars" multiple>
                            </select>

                            <button class="btn" type="submit">Забронировать</button>
                        </div>
                    </div>
                    <div class="data vertical g20">
                        <div class="form card vertical g20">
                            <h3>Данные клиента</h3>
                            <div class="grid f2 g20">
                                <div class="input-wrapper">
                                    <div class="hint">
                                        Дата начала бронирования
                                    </div>
                                    <input type="date" class="input" id="fromInput" name="date_from">
                                </div>
                                <div class="input-wrapper">
                                    <div class="hint">
                                        Дата возврата авто
                                    </div>
                                    <input type="date" class="input" id="toInput" name="date_to">
                                </div>
                            </div>
                            <div class="input-wrapper">
                                <div class="hint">
                                    Банковская карта
                                </div>
                                <select type="text" class="input" name="card_id">
                                    @foreach($cards as $card)
                                        <option value="{{$card->id}}">{{$card->number}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="booking-items grid f2 g40 mt40">
                            @if(count($cars))
                                @foreach($cars as $car)
                                    <div class="card booking-item" id="e{{$car->id}}">
                                        <div class="grid f3f1">
                                            <div class="contain-image">
                                                <img src="{{$car->image}}" alt="image">
                                            </div>
                                            <div class="vertical">
                                                <h3>{{$car->model}}</h3>
                                            </div>
                                        </div>
                                        <div class="vertical g10 mt20">
                                            <div class="flex g10">
                                                <div class="bold">Филиал:</div>
                                                <div class="value">{{$car->branch->name}}</div>
                                            </div>
                                            <div class="flex g10">
                                                <div class="bold">Номер машины:</div>
                                                <div class="value">{{$car->number}}</div>
                                            </div>
                                            <div class="flex g10">
                                                <div class="bold">Марка авто:</div>
                                                <div class="value">{{$car->model}}</div>
                                            </div>
                                            <div class="flex sb aic mt20">
                                                <button class="btn f">Выбрать</button>
                                                <div class="price-box" id="price">
                                                    <h3>{{$car->priceForSession}} ₽</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card">Машин не найдено.</div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @include('components.footer')
</div>
<script src="{{asset("assets/js/booking.js")}}"></script>

</body>
</html>
