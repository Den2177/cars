<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <title>Страница банковские карты</title>
</head>
<body>
<!--cards page-->
<div class="wrapper">
    @include('components.header')
    @include('components.notification')

    <main class="main">
        <div class="bank-cards">
            <div class="container">
                <div class="flex sb aic">
                    <h2 class="mini">
                        Банковские карты
                    </h2>
                    <button class="btn" id="addCard">Добавить карту</button>
                </div>
                @if(count($cards))
                    <div class="bank-items grid f3 mt40" id="bank-cards">
                        @foreach($cards as $card)
                            <div class="card bank-card onhover" id="e{{$card->id}}">
                                <div class="flex sb">
                                    <h3 class="card-number">{{$card->number}}</h3>
                                    <div class="contain-image card-image">
                                        <img src="{{asset("assets/images/card/mc_vrt_opt_pos_73_3x.png")}}" alt="card">
                                    </div>
                                </div>
                                <div class="flex sb aic mt25">
                                    <h4 class="mini card-state">
                                        Активна
                                    </h4>

                                    <a href="{{route('cards.destroy', $card->id)}}" class="btn black">Удалить</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="card mt40">Вы пока не добавили карты</div>
                @endif
            </div>
            <div class="modal-bc">
                <form action="{{route('cards.store')}}" method="post" class="card">
                    <h3>Добавить карту</h3>
                    <div class="card card-form vertical g20">
                        @csrf
                        <div class="input-wrapper">
                            <div class="hint">Номер карты</div>
                            <input type="number" class="input" id="card-number" name="number">
                        </div>
                        <div class="grid f2f1">
                            <div class="input-wrapper">
                                <div class="hint">Срок до</div>
                                <input type="date" class="input" id="date_to" name="date_to">
                            </div>
                            <div class="input-wrapper">
                                <div class="hint">Код CVV/CVC</div>
                                <input type="number" class="input" id="cvv" name="cvv">
                            </div>
                        </div>
                        <div class="input-wrapper">
                            <div class="hint">Имя и фамилия держателя банковской карты латиницей</div>
                            <input type="text" class="input" id="full_name" name="full_name">
                        </div>
                    </div>
                    <div class="right flex g5 mt20 jcfe">
                        <button class="btn reverse" id="cancel" type="button">Отмена</button>
                        <button class="btn" id="confirm" type="submit">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @include('components.footer')
</div>
<script src="{{asset("assets/js/cards.js")}}"></script>
</body>
</html>
