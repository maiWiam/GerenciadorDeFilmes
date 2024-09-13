<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Add Movie</title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark shadow-sm mb-4">
    <a class="navbar-brand ms-3" href="#">Movie Manager</a>
</nav>

<div class="container">
    <h1>Add Movie</h1>

    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form for adding movies -->
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="sinopse" class="form-label">Sinopse</label>
            <input type="text" class="form-control" id="sinopse" name="sinopse" required>
        </div>
        <div class="mb-3">
            <label for="ano" class="form-label">Ano</label>
            <input type="number" class="form-control" id="ano" name="ano" required>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select class="form-select" id="categoria" name="categoria" required>
                <option value="Ação">Ação</option>
                <option value="Drama">Drama</option>
                <option value="Documentário">Documentário</option>
                <option value="Ficção Científica">Ficção Científica</option>
                <option value="Mistério">Mistério</option>
                <option value="Terror">Terror</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="capa" class="form-label">Capa</label>
            <input type="file" class="form-control" id="capa" name="capa" required>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="url" class="form-control" id="link" name="link" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Button to view movies -->
    <div class="mt-3">
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Ver Filmes</a>
    </div>
</div>

</body>
</html>
