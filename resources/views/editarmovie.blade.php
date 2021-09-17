@extends('layouts.template')

@section('title', 'Edit Movies | Adapti Ps')

@section('content')

    <form id="form-create" action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Título</label>
        <input class="input-edit" value="{{ $movie->title }}" type="text" id="title" name="title" placeholder="Titulo" required>
        <label for="genre">Genêro</label>
        <input class="input-edit" value="{{ $movie->genre }}" type="text" id="genre" name="genre" placeholder="Genero" required>
        <label for="release">Lançamento</label>
        <input class="input-edit" value="{{ $movie->release }}" type="date" id="release" name="release" placeholder="Lançamento" required>
        <label for="rating">Nota</label>
        <input class="input-edit" value="{{ $movie->rating }}" type="number" id="rating" name="rating" placeholder="Nota" required>
        <label for="Descrição">Descrição</label>
        <textarea class="input-edit" name="synopsis" id="Descrição" required>{{ $movie->synopsis }}</textarea>
        <label for="country_id">País</label>
        <select class="input-edit" value="{{ $movie->country_id }}" name="country_id" id="country_id" required>
            <option value="" disabled selected>---> Escolha um país <---</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}" {{ $country->id==$movie->country_id ? 'selected': '' }} >{{ $country->country }}</option>
            @endforeach
        </select>
        <label for="image">Imagem</label>
        <input class="input-create" type="file" id="image" name="image" accept="image/*">
        <img src="/storage/{{ $movie->image }}" class="input-edit" type="file" id="image" style="width:150px; height:150px; object-fit: cover" alt="Imagem da capa do filme {{ $movie->title }}">
        <button class="btn-salve" type="submit" form="form-create">Salvar</button>
        <a class="btn-back" href="{{ route('movie.index') }}">Voltar</a>
    </form>
    <script src="/js/index.js"></script>
@endsection