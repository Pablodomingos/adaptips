@extends('layouts.template')
@section('title', 'Movies | Adapti Ps')

@section('content')

    <div class="btn-logout" aria-labelledby="navbarDropdown">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <div class="search">
        <form action="{{ route('movie.index') }}" method="GET">
            <input class="btn-search" type="text" id="search" name="search" placeholder="Procurar...">
            <button class="btn-icon-search" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    @if ($search)
        <p>Buscando por {{ $search }}</p>
        @if (count($movies) != 0 && $search)
            <a href="{{ route('movie.index') }}"> Voltar</a>
        @endif
    @endif

    @foreach ($movies as $movie)
        <div class="box">
            <h3 class="title-movie">{{ $movie->title }}</h3>
            <div class="box-box-content">
                <a class="btn-edit" href="{{ route('movie.edit', $movie->id) }}"><i class="fas fa-edit"></i></a>
                <form action="{{ route('movie.destroy', $movie->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a class="btn-destroy" type="submit" href="{{ route('movie.destroy', $movie->id) }}"><i class="fas fa-trash-alt"></i></a>
                </form>
            </div>

            <form class="img-movie" action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <img src="storage/{{ $movie->image }}" alt="{{ $movie->title }}" width="220" height="240" />
            </form>

            <div class="info-content">
                <p>Genero: {{ $movie->genre }}</p>
                <p><strong>País:<strong>{{ $movie->country->country }}</p>
                <p><strong>Lançamento:<strong>{{ $movie->release }}</p>
                <p><strong>Nota:<strong>{{ $movie->rating }}</p>
                <p><strong>Descrição:<strong>{{ $movie->synopsis }}</p>
            </div>
        </div>
    @endforeach

    @if (count($movies) == 0 && $search)
        <p>Não foi possível encontrar nem um filme com o nome: {{ $search }}! <a href="{{ route('movie.index') }}">Ver disponíveis</a></p>
    @elseif (count($movies)==0)
        <p>Esse filme não está disponivel no momento</p>
    @endif

    <img src="storage/movies/adapti.png" alt="logo adapti" class="adapti-logo">
    <!--<h4 class="fim">Filmes Adapti</h4>-->
    <script src="/js/index.js"></script>
@endsection