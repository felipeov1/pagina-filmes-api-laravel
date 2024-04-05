<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <title>Lista de Filmes</title>
</head>

<body>
    <section class="main">
        <nav class="navbar">
            <a href="#" class="logo">
                <img src="{{ asset('logo.png') }}" alt="logo">
            </a>
            <input class="menu-btn" type="checkboc" id="menu-btn">
            <label class="menu-icon" for="menu-btn">
                <span class="nav-icon"></span>
            </label>

            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="{{ route('filmes.visualizar') }}">Filmes</a></li>
            </ul>
        </nav>
        <div class="main-heading">
            <h1>Milhares de Filmes</h1>
            <p class="details">Assista diversos filmes em um só lugar!</p>
            <div class="header-btns">
                <a href="{{ route('filmes.visualizar') }}" class="header-btn">Catalágo</a>
            </div>
        </div>
    </section>
    <div class="containerMovies">
        <div class="grid-container">
            @foreach ($filmes as $filme)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        @if (isset($filme['primaryImage']) && isset($filme['primaryImage']['url']))
                            <img src="{{ $filme['primaryImage']['url'] }}" alt="{{ $filme['titleText']['text'] }}">
                        @else
                            <img src="{{ asset('logo-filme.png') }}" alt="Imagem Padrão">
                        @endif
                        <h5 class="card-title">{{ $filme['titleText']['text'] }}</h5>
                        @if (isset($filme['releaseDate']) && isset($filme['releaseDate']['year']))
                            <p class="card-title">Ano: {{ $filme['releaseDate']['year'] }}</p>
                        @else
                            <p class="card-text"><b>Ano: sem informações</b></p>
                        @endif
                        <p class="card-text">{{ $filme['titleText']['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="pagination">
        {{ $filmes->links('vendor.pagination.bootstrap-4') }}
    </div>
</body>
