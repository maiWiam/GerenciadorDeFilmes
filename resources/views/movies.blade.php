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

<!-- Filter Buttons -->
<div class="container mb-4">
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Filtrar por ano
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Mais novos</a></li>
            <li><a class="dropdown-item" href="#">Mais antigos</a></li>
        </ul>
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
        </ul>
    </div>
</div>

<!-- Movie Gallery -->
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card" data-bs-toggle="modal" data-bs-target="#movieModal"
                 data-name="Movie Title" data-synopsis="Movie synopsis goes here." data-year="2023" 
                 data-category="Action" data-image="https://m.media-amazon.com/images/M/MV5BMWFmNWJhNjAtNjI1MS00Yzg5LTg5NGQtMmMyMDAxN2I5ZDg4XkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg" 
                 data-link="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                <img src="https://m.media-amazon.com/images/M/MV5BMWFmNWJhNjAtNjI1MS00Yzg5LTg5NGQtMmMyMDAxN2I5ZDg4XkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg" class="card-img-top" alt="Movie Poster">
                <div class="card-body">
                    <p class="card-text">Movie Title</p>
                </div>
            </div>
        </div>
        <!-- Repeat the above block for more movie posters -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="movieModal" tabindex="-1" aria-labelledby="movieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movieModalLabel">Movie Details</h5>
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