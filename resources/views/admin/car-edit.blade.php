<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>Страница редактирования</title>
</head>
<body>
@include('components.notification')
<div class="auth">
    <div class="container">
        <form action="{{route('cars.update', $car->id)}}" method="post" class="f420 card vertical g20"
              enctype="multipart/form-data">
            @csrf
            @method('patch')
            <h4>Редактировать машину</h4>
            <div class="vertical g5">
                <div class="hint">Модель</div>
                <input type="text" class="input" name="model" value="{{$car->model}}">
            </div>
            <div class="vertical g5">
                <div class="hint">Номер авто</div>
                <input type="text" class="input" name="number" value="{{$car->number}}">
            </div>
            <div class="vertical g5">
                <div class="hint">Описание</div>
                <textarea type="text" class="input" name="description">{{$car->description}}</textarea>
            </div>
            <div class="vertical g5">
                <div class="hint">Филиал</div>
                <select type="text" class="input" name="branch_id">
                    @foreach($branches as $branch)
                        <option {{$car->branch_id === $branch->id ? 'selected' : ''}} value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="vertical g5">
                <div class="hint">Цена за сессию (в рублях)</div>
                <input type="number" class="input" name="priceForSession" value="{{$car->priceForSession}}">
            </div>
            <div class="vertical g5">
                <div class="hint">Фото</div>
                <input type="file" class="input" name="image">
            </div>
            <button class="btn" type="submit">Отредактировать</button>
        </form>
    </div>
</div>
</body>
</html>
