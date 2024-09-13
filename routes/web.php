<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Página inicial (galeria de filmes)
Route::get('/', [MovieController::class, 'index'])->name('movies.index');

// Rota para exibir o formulário de adição de filmes
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');

// Rota para armazenar um novo filme
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');

// Rota para exibir o formulário de edição de um filme
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');

// Rota para atualizar um filme existente
Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');

// Rota para excluir um filme
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

// Rota para exibir o formulário de login
Route::get('/login', function () {
    return view('login'); // Certifique-se de criar a view login.blade.php
})->name('login');
