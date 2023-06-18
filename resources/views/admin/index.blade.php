<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>Страница администратора</title>
</head>
<body>
@include('components.header')
@include('components.notification')

<main class="main">
    <div class="container">
        <div class="grid f1f3">
            <div class="vertical g20">
                <form action="{{route('cars.store')}}" method="post" class="card vertical g20"
                      enctype="multipart/form-data">
                    @csrf
                    <h4>Добавить машину</h4>
                    <div class="vertical g5">
                        <div class="hint">Модель</div>
                        <input type="text" class="input" name="model">
                    </div>
                    <div class="vertical g5">
                        <div class="hint">Номер авто</div>
                        <input type="text" class="input" name="number" value="#">
                    </div>
                    <div class="vertical g5">
                        <div class="hint">Описание</div>
                        <textarea type="text" class="input" name="description"></textarea>
                    </div>
                    <div class="vertical g5">
                        <div class="hint">Филиал</div>
                        <select type="text" class="input" name="branch_id">
                            @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="vertical g5">
                        <div class="hint">Цена за сессию (в рублях)</div>
                        <input type="number" class="input" name="priceForSession">
                    </div>
                    <div class="vertical g5">
                        <div class="hint">Фото</div>
                        <input type="file" class="input" name="image">
                    </div>
                    <button class="btn" type="submit">Создать</button>
                </form>
                <form action="{{route('branches.store')}}" enctype="multipart/form-data" method="post"
                      class="card vertical g20" method="POST">
                    @csrf
                    <h4>Добавить филиал</h4>
                    <div class="vertical g5">
                        <div class="hint">Категория</div>
                        <input type="text" class="input" name="name">
                    </div>
                    <div class="vertical g5">
                        <div class="hint">Фото</div>
                        <input type="file" class="input" name="image">
                    </div>
                    <button class="btn" type="submit">Создать</button>
                </form>
            </div>
            <div class="right vertical g40">
                @if(count($branches))
                    <div class="vertical g20">
                        <h3>Таблица филиалов</h3>
                        <div class="card table-wrapper">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Изображение</th>
                                    <th>Дата создания</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($branches as $branch)
                                    <tr>
                                        <td>{{$branch->id}}</td>
                                        <td>{{$branch->name}}</td>
                                        <td>
                                            <a href="{{$branch->image}}" target="_blank"
                                               class="link table-link">Открыть</a>
                                        </td>
                                        <td>{{$branch->created_at}}</td>
                                        <td>
                                            <a href="{{route('branches.edit', $branch->id)}}" class="link table-link">Редактировать</a>
                                        </td>
                                        <td>
                                            <a href="{{route('branches.destroy', $branch->id)}}"
                                               class="link table-link red">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card">Список филлиалов пуст.</div>
                @endif
                @if(count($cars))
                    <div class="vertical g20">
                        <h3>Таблица машин</h3>
                        <div class="card table-wrapper">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Модель</th>
                                    <th>Номер</th>
                                    <th>Описание</th>
                                    <th>Цена</th>
                                    <th>ID филлиала</th>
                                    <th>Изображение</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($cars as $car)
                                    <tr>
                                        <td>{{$car->id}}</td>
                                        <td>{{$car->model}}</td>
                                        <td>{{$car->number}}</td>
                                        <td class="description">{{$car->description}}</td>
                                        <td>{{$car->priceForSession}} ₽</td>
                                        <td>{{$car->branch_id}}</td>
                                        <td>
                                            <a href="{{$car->image}}" target="_blank"
                                               class="link table-link">Открыть</a>
                                        </td>
                                        <td>
                                            <a href="{{route('cars.edit', $car->id)}}" class="link table-link">Редактировать</a>
                                        </td>
                                        <td>
                                            <a href="{{route('cars.destroy', $car->id)}}"
                                               class="link table-link red">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    @else
                        <div class="card">Список машин пуст.</div>
                    @endif
            </div>
        </div>
    </div>
</main>
</body>
</html>
