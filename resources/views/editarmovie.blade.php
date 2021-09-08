<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme | Adapti PS</title>
</head>
<body>
    <form id="form-create" action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input value="{{ $movie->title }}" type="text" name="title" placeholder="Titulo" required>
        <input value="{{ $movie->genre }}"type="text" name="genre" placeholder="Genero" required>
        <select value="{{ $movie->country_id }}" name="country_id" id="country_id">
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country }}</option>
            @endforeach
        </select>
        <input value="{{ $movie->release }}" type="text" name="release" placeholder="Lançamento" required>
        <input value="{{ $movie->rating }}"type="text" name="rating" placeholder="Nota" required>
        <textarea name="synopsis" id="synopsis" cols="30" rows="10">{{ $movie->synopsis }}</textarea>
        <input value="storage/{{ $movie->image }}" type="file" name="image" accept="image/*">
        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('movie.index') }}"><button>Voltar</button></a>
</body>
</html>