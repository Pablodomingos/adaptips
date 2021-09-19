@extends('layouts.template')

@section('title', 'Edit Movies | Adapti Ps')

@section('content')

    <form class="form-create" id="form-create" action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="div-create">
            <label class="label-create" for="title">Título</label>
            <input class="input-create" value="{{ $movie->title }}" type="text" id="title" name="title" placeholder="Titulo" required>
            <label class="label-create" for="genre">Genêro</label>
            <input class="input-create" value="{{ $movie->genre }}" type="text" id="genre" name="genre" placeholder="Genero" required>
            <label class="label-create" for="release">Lançamento</label>
            <input class="input-createDesc" value="{{ $movie->release }}" type="date" id="release" name="release" placeholder="Lançamento" required>
            <label class="label-create" for="rating">Nota</label>
            <input class="input-create" value="{{ $movie->rating }}" type="number" id="rating" name="rating" placeholder="Nota" required>
            <label class="label-create" for="Descrição">Descrição</label>
            <textarea class="input-createDesc" name="synopsis" rows="14" id="Descrição" required>{{ $movie->synopsis }}</textarea>
            <label class="label-create" for="country_id">País</label>
            <select class="input-create" value="{{ $movie->country_id }}" name="country_id" id="country_id" required>
                <option class="value-country" value="" disabled selected>---> Escolha um país <---</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ $country->id==$movie->country_id ? 'selected': '' }} >{{ $country->country }}</option>
                @endforeach
            </select>
            <div class="div-createImg">
                <form class="form-img" action="{{ asset('/js/preview.js') }}" method="POST" enctype="multipart/form-data">
                    <label class="text-imagem" for="image">Imagem</label>
                    <input class="input-create" type="file" id="image" name="image" accept="image/*">
                    <img class="img-create" src="/storage/{{ $movie->image }}" class="input-create" type="file" id="image" object-fit: cover" alt="Imagem da capa do filme {{ $movie->title }}">
                </form>
                <button class="btn-salve" type="submit" form="form-create">Salvar</button>
                <a class="div-back" href="{{ route('movie.index') }}">Voltar</a>
            </div>
        </div>
    </form>
    
@endsection