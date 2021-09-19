@extends('layouts.template')

@section('title', 'Add Movies | Adapti Ps')
    

@section('content')
    <script src="{{ asset('/js/preview.js') }}"></script>
    <form class="form-create" id="form-create" action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="div-create">
            <label for="title" class="label-create">Título</label>
            <input class="input-create" type="text" id="title" name="title" placeholder="Titulo" required>
            <label for="genre"  class="label-create">Genêro</label>
            <input class="input-create" type="text" id="genre" name="genre" placeholder="Genero" required>
            <label for="release"  class="label-create">Lançamento</label>
            <input class="input-createDesc" type="date" id="release" name="release" placeholder="Lançamento" required>
            <label for="rating"  class="label-create">Nota</label>
            <input class="input-create" type="number" id="rating" name="rating" placeholder="Nota" required>
            <label for="Descrição"  class="label-create">Descrição</label>
            <textarea class="input-createDesc"  rows="14" name="synopsis" id="Descrição" required></textarea>
            <label for="country_id"  class="label-create">País</label>
            <select class="input-create" name="country_id" id="country_id" required>
                <option class="value-country" value="" disabled selected>---> Escolha um país <---</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                @endforeach
            </select>
            <div class="div-createImg">
                <form class="form-img" action="{{ asset('/js/preview.js') }}" method="POST" enctype="multipart/form-data">
                    <label class="text-imagem" for="image">Imagem</label>
                    <input class="input-create" type="file" id="image" onchange="preview()" name="image" accept="image/*" required>
                    <img class="img-create">
                </form>
                <button class="btn-salve" type="submit" form="form-create">Criar Filme</button>
                <a class="div-back" href="{{ route('movie.index') }}">Voltar</a>
            </div>
        </div>
    </form>
    <script src="{{ asset('/js/preview.js') }}"></script>
@endsection