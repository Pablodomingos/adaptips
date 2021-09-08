<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deletar Filmes | Adapti Ps</title>
</head>
<body>
    <form id="form-create" action="{{ route('movie.destroy', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @foreach ($movies as $movie)
        <a href="{{ route('movie.destroy', $movie->id) }}"><button>Delete</button></a>
    @endforeach
</body>
</html>