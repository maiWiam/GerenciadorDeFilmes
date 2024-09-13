<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    // Método para exibir a galeria de filmes
    public function index()
    {
        $filmes = Movie::all(); // Pega todos os filmes
        return view('movies', compact('filmes')); // Nome da view para a galeria de filmes
    }

    // Método para exibir o formulário de adição de filmes
    public function create()
    {
        $filmes = Movie::all(); // Pega todos os filmes (opcional, se necessário na view de adição)
        return view('add', compact('filmes')); // Nome da view para o formulário de adição
    }

    // Método para armazenar um novo filme
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

        return redirect()->route('movies.index')->with('success', 'Movie added successfully!');
    }

    // Método para exibir o formulário de edição de filmes
    public function edit($id)
    {
        $filme = Movie::findOrFail($id);
        return view('edit', compact('filme')); // Nome da view para o formulário de edição
    }

    // Método para atualizar um filme
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sinopse' => 'required|string|max:255',
            'ano' => 'required|integer',
            'categoria' => 'required|in:Ação,Drama,Documentário,Ficção Científica,Mistério,Terror',
            'capa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required|url',
        ]);

        $filme = Movie::findOrFail($id);
        $filme->name = $request->input('name');
        $filme->sinopse = $request->input('sinopse');
        $filme->ano = $request->input('ano');
        $filme->categoria = $request->input('categoria');
        $filme->link = $request->input('link');

        if ($request->hasFile('capa')) {
            $file = $request->file('capa');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $filme->capa = $filename;
        }

        $filme->save();

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    // Método para deletar um filme
    public function destroy($id)
    {
        $filme = Movie::findOrFail($id);
        if ($filme->capa) {
            unlink(public_path('images/' . $filme->capa));
        }
        $filme->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
}
