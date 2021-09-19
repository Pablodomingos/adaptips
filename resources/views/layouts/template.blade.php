<!DOCTYPE html>
<html lang="pt-br" data-theme="dark">

<script src="{{ asset('/js/index.js') }}"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('/css/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet" type="text/css" />
    <link href='https://css.gg/edit-contrast.css' rel='stylesheet'>
    <link href='https://css.gg/eye.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1574ae680b.js" crossorigin="anonymous"></script>
</head>

<body class="body-container">
    <header class="header-container">
        <a class="header-logo" href="{{ route('movie.index') }}"> Adapti Flix</a>
        <nav class="nav-container">
            <div class="div-dark">
                <label class="label-dark" for="switch">
                    <button class="btn-ligth" id="switchLigth" >Ligth</button>
                    <button class="btn-dark" id="switchDark" >Dark</button>
                </label>
            </div>
            <ul class="nav-items">
                <li class="nav-li"><a class="a-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                </a></li>
                <li class="nav-li1"><a class="btn-criar" href="{{ route('movie.create') }}">Adicone um Filmes</a></li>
            </ul>
        </nav>
    </header>
    <main class="main-container">
        @yield('content')
    </main>
    <footer class="footer-container">
        <a href="https://www.adapti.info/" alt="logo adapti""><img src="/storage/movies/adapti.png" class="adapti-logo"></a>
        <ul>
            <li class="footer-icons" ><a href="https://www.facebook.com/AdaptiEmpresaJr"><i class="fab fa-facebook-f"></i></a></li>
            <li class="footer-icons" ><a href="https://www.instagram.com/adaptiempresajr"><i class="fab fa-instagram"></i></a></li>
            <li class="footer-icons" ><a href="https://www.linkedin.com/company/adaptiempresajr/"><i class="fab fa-linkedin"></i></a></li>
        </ul>
    </footer>
</body>

<script src="{{ asset('/js/index.js') }}"></script>

</html>
