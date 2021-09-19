@extends('layouts.template')
@section('title', 'Movies | Adapti Ps')

@section('content')
    <div class="btn-logout" aria-labelledby="navbarDropdown">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <div class="search">
        <form class="form-search" action="{{ route('movie.index') }}" method="GET">
            <input class="btn-search" type="text" id="search" name="search" placeholder="Procurar...">
            <button class="btn-icon-search" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <h1 class="text-filmes">Filmes</h1>

    <section class="section-content">
        @if ($search)
            <p class="p-content1" >Buscando por {{ $search }}</p>
        @endif

        <div class="div-body">
            @foreach ($movies as $movie)
            
                <div class="box">
                    <div class="box-top">
                        <h3 class="title-movie">{{ $movie->title }}</h3>
                        <div class="box-box-content">
                            <a class="btn-edit" href="{{ route('movie.edit', $movie->id) }}"><i class="fas fa-edit"></i></a>
                            <form class="form-destroy" action="{{ route('movie.destroy', $movie->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a class="btn-destroy" type="submit" href="{{ route('movie.destroy', $movie->id) }}"><button class="btn-destroy1"></button><i class="fas fa-trash-alt"></i></a>
                            </form>
                        </div>
                    </div>
                    
                    <form class="img-movie" action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <img class="img-movie" src="storage/{{ $movie->image }}" alt="{{ $movie->title }}"/>
                    </form>
                    
                    <div class="info-content">
                        <p class="genre"><strong>Genero</strong>: {{ $movie->genre }}</p>
                        <p class="country"><strong>País</strong>: {{ $movie->country->country }}</p>
                        <p class="release"><strong>Lançamento</strong>: {{ $movie->release }}</p>
                        <p class="rating"><strong>Nota</strong>: {{ $movie->rating }}</p>
                        <p class="synosis"><strong>Descrição</strong>: {{ $movie->synopsis }}</p>
                    </div>
                </div>
                
            @endforeach
        </div>
        
        @if (count($movies) != 0 && $search)
            <div class="div-searchS">
                <div class="div-back">
                    <a class="a-back" href="{{ route('movie.index') }}"> Voltar</a>
                </div>
            </div>
        @endif
        
        
        @if (count($movies) == 0 && $search)
            <p class="p-content2" >Não foi possível encontrar nem um filme com o nome: {{ $search }}! <a href="{{ route('movie.index') }}" class="div-back">Ver disponíveis</a></p>
        @endif
    </section>

@endsection