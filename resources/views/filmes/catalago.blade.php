<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <title>Lista de Filmes</title>
</head>

<body>
    <section class="mainFilmes">
        <nav class="navbar">
            <a href="#" class="logo">
                <img src="{{ asset('logo.png') }}" alt="logo">
            </a>
            <input class="menu-btn" type="checkboc" id="menu-btn">
            <label class="menu-icon" for="menu-btn">
                <span class="nav-icon"></span>
            </label>

            <ul class="menu">
                <li><a href="{{ route('filmes.listar') }}">Home</a></li>
                <li><a href="#">Filmes</a></li>
            </ul>
        </nav>
    </section>
    <div class="containerCatalagoMovies">
        <div class="grid-container" id="grid-catalago">
            @foreach ($movie_data->results as $filme)
                <div class="card" id="catalago" style="width: 18rem; margin-bottom:10px">
                    <div class="card-body">
                        <img src="{{ $filme->poster_path}}" alt="{{ $filme->title }}">
                        <h5 class="card-title">{{ $filme->title }}</h5>
                        <p class="card-title">Ano: {{ $filme->release_date }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="pagination">
        {{ $movie_data->links('vendor.pagination.bootstrap-4') }}
    </div> --}}
</body>
