<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Página inicial (galeria de filmes)
Route::get('/', [MovieController::class, 'index'])->name('movies.index');

// Rota para exibir o formulário de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Rota para processar o login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Rota para processar o logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rota para exibir o formulário de registro
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Rota para processar o registro
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});
