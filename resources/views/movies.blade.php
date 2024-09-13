<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Movie Gallery</title>
    <style>
        .card img {
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark shadow-sm mb-4">
    <a class="navbar-brand ms-3" href="#">Movie Gallery</a>
</nav>

<!-- Movie Gallery -->
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($filmes as $filme)
            <div class="col">
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

<!-- Modal -->
<div class="modal fade" id="movieModal" tabindex="-1" aria-labelledby="movieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movieModalLabel">Movie Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                 
                    <div class="col-md-8">
                        <h5 id="modalName">Movie Name</h5>
                        <p><strong>Sinopse:</strong> <span id="modalSynopsis">Synopsis goes here.</span></p>
                        <p><strong>Ano:</strong> <span id="modalYear">Year</span></p>
                        <p><strong>Categoria:</strong> <span id="modalCategory">Category</span></p>
                        <p><strong>Link do Trailer:</strong> <a id="modalLink" href="" target="_blank">Watch Trailer</a></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modalElement = document.getElementById('movieModal');
        modalElement.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Botão que abriu o modal
            var name = button.getAttribute('data-name');
            var synopsis = button.getAttribute('data-synopsis');
            var year = button.getAttribute('data-year');
            var category = button.getAttribute('data-category');
            var image = button.getAttribute('data-image');
            var link = button.getAttribute('data-link');

            // Atualizar o conteúdo do modal
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalSynopsis').textContent = synopsis;
            document.getElementById('modalYear').textContent = year;
            document.getElementById('modalCategory').textContent = category;
            document.getElementById('modalImage').src = image;
            document.getElementById('modalLink').href = link;
        });
    });
</script>

</body>
</html>
