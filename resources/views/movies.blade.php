<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Filmes</title>
    <style>
        .navbar {
            margin-bottom: 2rem;
        }
        .card {
            border: none;
            border-radius: 0.5rem;
        }
        .card img {
            cursor: pointer;
            object-fit: cover;
            height: 800px; /* Ajuste a altura para um tamanho maior */
            width: 100%; /* Certifique-se de que a imagem ocupe toda a largura da carta */
            transition: filter 0.3s ease;
        }
        .card img:hover {
            filter: blur(5px);
        }
        .card-body {
            padding: 1rem;
        }
        .modal-content {    
            border-radius: 0.5rem;
        }
        .modal-header, .modal-footer {
            border: none;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark shadow-sm">
    <a class="navbar-brand ms-3" href="#">Galeria de filmes</a>
    <div class="ms-auto me-3">
        <a href="{{ route('register') }}" class="btn btn-outline-light">Registrar novo adiministrador</a>
        @auth
            <a href="{{ route('movies.create') }}" class="btn btn-outline-light">Gerenciar Filmes</a>
            <a href="{{ route('logout') }}" class="btn btn-outline-light" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
        @endauth
    </div>
</nav>

<div class="container mb-4">
    <form id="filterForm">
        <div class="row g-3">
            <div class="col-md-4">
                <label for="filterYear" class="form-label">Ano</label>
                <input type="number" id="filterYear" class="form-control" placeholder="Digite o ano">
            </div>
            <div class="col-md-4">
                <label for="filterCategory" class="form-label">Categoria</label>
                <select id="filterCategory" class="form-select">
                    <option value="">Todas as categorias</option>
                    <option value="Ação">Ação</option>
                    <option value="Drama">Drama</option>
                    <option value="Documentário">Documentário</option>
                    <option value="Ficção Científica">Ficção Científica</option>
                    <option value="Mistério">Mistério</option>
                    <option value="Terror">Terror</option>
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="button" id="filterButton" class="btn btn-primary w-100">Filtrar</button>
            </div>
        </div>
    </form>
</div>

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4" id="movieGallery">
        @foreach ($filmes as $filme)
            <div class="col movie-card" data-year="{{ $filme->ano }}" data-category="{{ $filme->categoria }}">
                <div class="card" data-bs-toggle="modal" data-bs-target="#movieModal"
                     data-name="{{ $filme->name }}" data-synopsis="{{ $filme->sinopse }}"
                     data-year="{{ $filme->ano }}" data-category="{{ $filme->categoria }}"
                     data-image="{{ asset('images/' . $filme->capa) }}" data-link="{{ $filme->link }}">
                    <img src="{{ asset('images/' . $filme->capa) }}" class="card-img-top" alt="Movie Poster">
                    <div class="card-body">
                        <p class="card-text">{{ $filme->name }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="modal fade" id="movieModal" tabindex="-1" aria-labelledby="movieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movieModalLabel">Detalhes do Filme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img id="modalImage" src="" class="img-fluid" alt="Movie Poster">
                    </div>
                    <div class="col-md-8">
                        <h5 id="modalName">Nome do Filme</h5>
                        <p><strong>Sinopse:</strong> <span id="modalSynopsis">Sinopse</span></p>
                        <p><strong>Ano:</strong> <span id="modalYear">Ano</span></p>
                        <p><strong>Categoria:</strong> <span id="modalCategory">Categoria</span></p>
                        <p><strong>Link do Trailer:</strong> <a id="modalLink" href="" target="_blank">Assistir Trailer</a></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modalElement = document.getElementById('movieModal');
        modalElement.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var name = button.getAttribute('data-name');
            var synopsis = button.getAttribute('data-synopsis');
            var year = button.getAttribute('data-year');
            var category = button.getAttribute('data-category');
            var image = button.getAttribute('data-image');
            var link = button.getAttribute('data-link');

            document.getElementById('modalName').textContent = name;
            document.getElementById('modalSynopsis').textContent = synopsis;
            document.getElementById('modalYear').textContent = year;
            document.getElementById('modalCategory').textContent = category;
            document.getElementById('modalImage').src = image;
            document.getElementById('modalLink').href = link;
        });

        document.getElementById('filterButton').addEventListener('click', function () {
            var yearFilter = document.getElementById('filterYear').value;
            var categoryFilter = document.getElementById('filterCategory').value;

            var movieCards = document.querySelectorAll('.movie-card');

            movieCards.forEach(function (card) {
                var cardYear = card.getAttribute('data-year');
                var cardCategory = card.getAttribute('data-category');

                var yearMatch = !yearFilter || cardYear == yearFilter;
                var categoryMatch = !categoryFilter || cardCategory == categoryFilter;

                if (yearMatch && categoryMatch) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    });
</script>

</body>
</html>
