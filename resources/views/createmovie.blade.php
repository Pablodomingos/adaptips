@extends('layouts.template')

@section('title', 'Add Movies | Adapti Ps')
    

@section('content')

    <form class="form-create" id="form-create" action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Título</label>
        <input class="input-create" type="text" id="title" name="title" placeholder="Titulo" required>
        <label for="genre">Genêro</label>
        <input class="input-create" type="text" id="genre" name="genre" placeholder="Genero" required>
        <label for="release">Lançamento</label>
        <input class="input-create" type="date" id="release" name="release" placeholder="Lançamento" required>
        <label for="rating">Nota</label>
        <input class="input-create" type="number" id="rating" name="rating" placeholder="Nota" required>
        <label for="Descrição">Descrição</label>
        <textarea class="input-create" name="synopsis" id="Descrição" required></textarea>
        <label for="country_id">País</label>
        <select class="input-create" name="country_id" id="country_id" required>
            <option value="" disabled selected>---> Escolha um país <---</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country }}</option>
            @endforeach
        </select>
        <label for="image">Imagem</label>
        <input class="input-create" type="file" id="image" name="image" accept="image/*" required>
        <button class="btn-salve" type="submit" form="form-create">Salvar</button>
        <a class="btn-back" href="{{ route('movie.index') }}">Voltar</a>
    </form>
    <script src="/js/index.js"></script>
@endsection