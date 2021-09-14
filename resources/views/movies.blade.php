<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Movies | Adapti</title>
        <link href="{{ asset('/css/reset.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/home.css') }}" rel="stylesheet" type="text/css" />
        <link href='https://css.gg/edit-contrast.css' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/1574ae680b.js" crossorigin="anonymous"></script>
    </head>

    <body class="corpo">
        <header class="cabeçalho">

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

            <a class="criar" href="{{ route('movie.create') }}"><button class="botao-criar"><i class="fas fa-plus-square"></i> Adicone um Filmes</button></a>

            <div class="botao-dark">
                <label for="switch">
                    <input class="dark" type="checkbox" id="switch"><i class="gg-edit-contrast"></i>
                </label>
            </div>
        </header>

        <div class="pesquisa">
            <form action="{{ route('movie.index') }}" method="GET">
                <input class="botao-pesquisa" type="text" id="search" name="search" placeholder="Procurar..."><button class="botao-pesquisa1"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <main class="principal">
            @if ($search)
                <p>Buscando por {{ $search }}</p>
                @if (count($movies) != 0 && $search)
                    <a href="{{ route('movie.index') }}"><button>Voltar</button></a>
                @endif
            @endif

            @foreach ($movies as $movie)
                <div class="counteudo">
                    <div class="caixa-conteudo">
                        <h1 class="titulo">{{ $movie->title }}</h2>
                        <div class="caixa-da-caixa-conteudo">
                            <a class="edite-delete" href="{{ route('movie.edit', $movie->id) }}"><button class="botao-editar"><i class="fas fa-edit"></i></button></a>
                            <form action="{{ route('movie.destroy', $movie->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a class="edite-delete" href="{{ route('movie.destroy', $movie->id) }}"><button class="botao-editar"><i class="fas fa-trash-alt"></i></button></a>
                            </form>
                        </div>
                    </div>
                    <form class="imagem" action="{{ route('movie.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <img src="storage/{{ $movie->image }}" alt="{{ $movie->title }}" width="220" height="240" />
                    </form>
                    
                    <div class="nomes">
                        <h2>Pais: {{ $movie->country->country }}</h2>
                        <h2>Data lançamento: {{ $movie->release }}</h3>
                        <h2>Genero: {{ $movie->genre }}</h3>
                        <h2>Descrição: {{ $movie->synopsis }}</h3>
                        <h2>Nota: {{ $movie->rating }}</h3>
                    </div>
                </div>
            @endforeach

            @if (count($movies) == 0 && $search)
                <p>Não foi possível encontrar nem um filme com o nome: {{ $search }}! <a
                        href="{{ route('movie.index') }}">Ver disponíveis</a></p>
            @elseif (count($movies)==0)
                <p>Esse filme não está disponivel no momento</p>
            @endif
        </main>

        <footer class="rodape">
            <img src="storage/movies/adapti.png" alt="logo adapti" class="adapti-logo">
            <!--<h4 class="fim">Filmes Adapti</h4>-->
        </footer>

        <script src="/js/index.js"></script>
    </body>
</html>
