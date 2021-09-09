<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies | Adapti</title>
    <link href="{{ asset('/css/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet" type="text/css" />
    <header>

    </header>
</head>

<body>
    <header>
        <a class="botao" href="{{ route('movie.create') }}"><button>Criar</button></a>
        <form class="pesquisa" action="{{ route('movie.index') }}" method="GET">
            <input type="text" id="search" name="search" placeholder="Procurar..."
                class="from-control"><button>Pesquisar</button>
        </form>
    </header>
    <main>

        @if ($search)
            <p>Buscando por {{ $search }}</p>
            @if (count($movies) != 0 && $search)
                <a href="{{ route('movie.index') }}"><button>Voltar</button></a>
            @endif
        @endif


        @foreach ($movies as $movie)
            <div class="caixa">
                <h2>{{ $movie->title }}</h2>
                <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img src="storage/{{ $movie->image }}" alt="Imagem" width="160" height="180" />
                </form>
                <h2>Pais: {{ $movie->country->country }}</h2>
                <h3>Data e Hora de lançamento: {{ $movie->release }}</h3>
                <h3>Genero: {{ $movie->genre }}</h3>
                <h3>Descrição: {{ $movie->synopsis }}</h3>
                <h3>Nota: {{ $movie->rating }}</h3>
                <a href="{{ route('movie.edit', $movie->id) }}"><button>Editar</button></a>
                <form action="{{ route('movie.destroy', $movie->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('movie.destroy', $movie->id) }}"><button>Delete</button></a>
                </form>
            </div>
        @endforeach


        @if (count($movies) == 0 && $search)
            <p>Não foi possível encontrar nem um filme com o nome: {{ $search }}! <a
                    href="{{ route('movie.index') }}">Ver disponíveis</a></p>
        @elseif (count($movies)==0)
            <p>Esse filme não está disponivel no momento</p>
        @endif

    </main>

    <footer>
        <h4 class="fim">Filmes Adapti</h4>
    </footer>

</body>

</html>
