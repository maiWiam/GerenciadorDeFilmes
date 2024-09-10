<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Add Movie</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="nome">Nome do Filme:</label>
            <input type="text" class="form-control" id="nome" placeholder="Enter movie name">
        </div>
        <div class="form-group">
            <label for="sinopse">Sinopse:</label>
            <input type="text" class="form-control" id="sinopse" placeholder="Enter synopsis">
        </div>
        <div class="form-group">
            <label for="ano">Ano:</label>
            <input type="number" class="form-control" id="ano" placeholder="Enter year">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" id="categoria">
                <option value="">Ação</option>
                <option value="">Drama</option>
                <option value="">Documentário</option>
                <option value="">Ficção Científica</option>
                <option value="">Mistério</option>
                <option value="">Terror</option>
            </select>
        </div>
        <div class="form-group">
            <label for="capa">Imagem da Capa:</label>
            <input type="file" class="form-control-file" id="capa">
        </div>
        <div class="form-group">
            <label for="link">Link do Trailer:</label>
            <input type="text" class="form-control" id="link" placeholder="Enter trailer link">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
