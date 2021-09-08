<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies | Adapti</title>
</head>
<body>
    <a href="{{ route('movie.create') }}"><button>Criar</button></a>
    <form action="{{ route('movie.index',) }}" method="GET">
        <input type="text" id="search" name="search" placeholder="Procurar..." class="from-control"><button>Pesquisar</button>
    </form>   
    
    @if ($search)
        <p>Buscando por {{ $search }}</p>
        @if (count($movies)!=0 && $search)
            <a href="{{ route('movie.index') }}"><button>Voltar</button></a>
        @endif 
    @endif
    
    @foreach ($movies as $movie)
        
        <h2>{{ $movie->title }} from {{ $movie->country->country }}</h2>
        <h3>Data e Hora de lançamento: {{ $movie->release }}</h3>
        <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
            <img src="storage/{{ $movie->image }}" alt="Imagem" width="80" height="100"/>
        </form>
        <a href="{{ route('movie.edit', $movie->id) }}"><button>Editar</button></a>
        <form action="{{ route('movie.destroy', $movie->id) }}" method="POST">
            @csrf
            @method('delete')
            <a href="{{ route('movie.destroy', $movie->id) }}"><button>Delete</button></a>
        </form>

    @endforeach

    @if (count($movies)==0 && $search)
        <p>Não foi possível encontrar nem um filme com {{ $search }}! <a href="{{ route('movie.index') }}">Ver disponíveis</a></p>
    @elseif (count($movies)==0)
        <p>Esse filme não está disponivel no momento</p>
    @endif

    <h4>Filmes Adapti</h4>
</body>
</html>
