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
        <form action="{{route('branches.update', $branch->id)}}" enctype="multipart/form-data" class="form card vertical g20" method="post">
            @csrf
            @method('patch')
            <div class="vertical g0">
                <div class="hint">Название</div>
                <input type="text" class="input" name="name" value="{{$branch->name}}">
            </div>
            <div class="vertical g5">
                <div class="hint">Фото</div>
                <input type="file" class="input" name="image">
            </div>
            <button class="btn" type="submit">Обновить</button>
        </form>
    </div>
</div>
</body>
</html>
