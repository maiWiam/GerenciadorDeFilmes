<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Edit Movie</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark shadow-sm mb-4">
    <a class="navbar-brand ms-3" href="#">Movie Manager</a>
</nav>

<div class="container">
    <h1>Edit Movie</h1>

    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form for editing movies -->
    <form action="{{ route('movies.update', $filme->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $filme->name }}" required>
        </div>
        <div class="mb-3">
            <label for="sinopse" class="form-label">Sinopse</label>
            <input type="text" class="form-control" id="sinopse" name="sinopse" value="{{ $filme->sinopse }}" required>
        </div>
        <div class="mb-3">
            <label for="ano" class="form-label">Ano</label>
            <input type="number" class="form-control" id="ano" name="ano" value="{{ $filme->ano }}" required>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select class="form-select" id="categoria" name="categoria" required>
                <option value="Ação" {{ $filme->categoria == 'Ação' ? 'selected' : '' }}>Ação</option>
                <option value="Drama" {{ $filme->categoria == 'Drama' ? 'selected' : '' }}>Drama</option>
                <option value="Documentário" {{ $filme->categoria == 'Documentário' ? 'selected' : '' }}>Documentário</option>
                <option value="Ficção Científica" {{ $filme->categoria == 'Ficção Científica' ? 'selected' : '' }}>Ficção Científica</option>
                <option value="Mistério" {{ $filme->categoria == 'Mistério' ? 'selected' : '' }}>Mistério</option>
                <option value="Terror" {{ $filme->categoria == 'Terror' ? 'selected' : '' }}>Terror</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="capa" class="form-label">Capa</label>
            <input type="file" class="form-control" id="capa" name="capa">
            @if ($filme->capa)
                <img src="{{ asset('storage/' . $filme->capa) }}" alt="Movie Cover" class="img-thumbnail mt-2" style="max-width: 150px;">
            @endif
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="url" class="form-control" id="link" name="link" value="{{ $filme->link }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>

</body>
</html>
