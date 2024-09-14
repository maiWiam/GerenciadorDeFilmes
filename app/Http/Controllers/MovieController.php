<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $filmes = Movie::all(); 
        return view('movies', compact('filmes')); 
    }

    public function create()
    {
        $filmes = Movie::all(); 
        return view('add', compact('filmes')); 
    }

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

        $filename = null;

        if ($request->hasFile('capa')) {
            $file = $request->file('capa');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
        }

        Movie::create([
            'name' => $request->input('name'),
            'sinopse' => $request->input('sinopse'),
            'ano' => $request->input('ano'),
            'categoria' => $request->input('categoria'),
            'capa' => $filename,
            'link' => $request->input('link'),
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully!');
    }

    public function edit($id)
    {
        $filme = Movie::findOrFail($id);
        return view('edit', compact('filme')); 
    }

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
