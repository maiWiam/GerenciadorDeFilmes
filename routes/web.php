
<?php
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Página inicial (formulário de adição de filmes)
Route::get('/', function () {
    return view('add');
});

// Rota para o formulário de adição de filmes
Route::get('/movies/create', function () {
    return view('add');
})->name('movies.create');

// Rota para o armazenamento de filmes
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');

// Rota para exibir a lista de filmes
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

