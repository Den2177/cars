<header class="header">
    <div class="container">
        <a href="{{route('home')}}" class="logo flex g2">
            <span class="logo-text">Э</span>
            <svg class="logo-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path
                    d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"/>
            </svg>
            <span class="logo-text">
                    ектроСитиДрайв
                </span>
        </a>
        <nav class="flex g20">
            <a href="{{route('branches')}}" class="link">Филиалы</a>
            @if(auth()->check())
                <a href="{{route('history.list')}}" class="link">История</a>
                <a href="{{route('profile')}}" class="link">Личный кабинет</a>
                <a href="{{route('cards')}}" class="link">Банковские карты</a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{route('admin')}}" class="btn">Админ панель</a>
                @endif
                <a href="{{route('logout')}}" class="link">Выйти</a>
            @endif
        </nav>
        <div class="flex g20">
            @if(!auth()->check())
                <a href="{{route('login')}}" class="link">Войти</a>
                <a href="{{route('register')}}" class="btn">Зарегистрироваться</a>
            @endif
        </div>

    </div>
</header>
