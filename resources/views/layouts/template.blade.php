<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('/css/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet" type="text/css" />
    <link href='https://css.gg/edit-contrast.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1574ae680b.js" crossorigin="anonymous"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,600&family=Open+Sans&family=Teko:wght@300&display=swap" rel="stylesheet">

    <style>
        *{
            font-family: "wght@300";
        }
    </style>
</head>

<body>
    <header class="header-container">
        <a href="{{ route('movie.index') }}"> AdaptiFlix</a>
        <div class="btn-dark">
            <label for="switch">
                <input class="input-dark" type="checkbox" id="switch"><i class="gg-edit-contrast"></i>
            </label>
        </div>
        <nav class="nav-container">
            <ul class="nav-items">
                <li><a class="a-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                </a></li>
                <li><a class="btn-criar" href="{{ route('movie.create') }}">Adicone um Filmes</a></li>
            </ul>
        </nav>
    </header>
    <main class="main-container">
        @yield('content')
    </main>
    <footer class="footer-container"></footer>
</body>

</html>
