<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <title>Страница филиалов</title>
</head>
<body>
<!--branches page-->
<div class="wrapper">
    @include('components.header')
    @include('components.notification')
    <main class="main">
        <div class="branches">
            <div class="container">
                <div class="grid f3">
                    @foreach($branches as $branch)
                        <div class="branch-item" data-name="kras">
                            <div class="image" data-name="kras">
                                <img src="{{$branch->image}}" alt="map" data-name="kras">
                            </div>
                            <div class="price-box" data-name="kras">
                                <h3 data-name="kras">{{$branch->name}}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    @include('components.footer')
</div>
<script src="{{asset("assets/js/branches.js")}}"></script>
</body>
</html>
