<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link {{Request::is('/') ? 'active' : ''}}" href="/">Главная</a>
                <a class="nav-item nav-link {{Request::is('articles*') ? 'active' : ''}}" href="/articles">Каталог
                    статей</a>
            </div>
        </div>
    </nav>
    @yield('content')
</div>
@stack('scripts')
</body>
</html>
