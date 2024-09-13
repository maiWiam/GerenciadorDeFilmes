<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Movies List</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark shadow-sm mb-4">
    <a class="navbar-brand ms-3" href="#">Movie Manager</a>
</nav>

<div class="container">
    <h1>Movies List</h1>

    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Sinopse</th>
                <th>Ano</th>
                <th>Categoria</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->sinopse }}</td>
                    <td>{{ $movie->ano }}</td>
                    <td>{{ $movie->categoria }}</td>
                    <td><a href="{{ $movie->link }}" target="_blank">Watch</a></td>
                    <td>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        <a href="{{ route('movies.create') }}" class="btn btn-primary">Add New Movie</a>
    </div>
</div>

</body>
</html>
