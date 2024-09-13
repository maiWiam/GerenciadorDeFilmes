<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sinopse' => 'required|string|max:255',
            'ano' => 'required|integer',
            'categoria' => 'required|in:Ação,Drama,Documentário,Ficção Científica,Mistério,Terror',
            'capa' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required|url',
        ]);

        // Inicializar $filename como null
        $filename = null;

        // Verificar se o arquivo foi enviado
        if ($request->hasFile('capa')) {
            $file = $request->file('capa');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
        }

        // Criar um novo registro no banco de dados
        Movie::create([
            'name' => $request->input('name'),
            'sinopse' => $request->input('sinopse'),
            'ano' => $request->input('ano'),
            'categoria' => $request->input('categoria'),
            'capa' => $filename, // Usar $filename mesmo se for null
            'link' => $request->input('link'),
        ]);

        return redirect()->back()->with('success', 'Movie added successfully!');
    }

    public function index()
    {
        // Buscar todos os filmes do banco de dados
        $filmes = Movie::all();

        // Passar os filmes para a view
        return view('movies', compact('filmes')); // Aqui usamos 'movies', não 'movies.index'
    }
}
