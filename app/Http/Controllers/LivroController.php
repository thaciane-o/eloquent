<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Emprestimo;

class LivroController extends Controller
{
    public function index(Request $request) {
        return view('livros.index', ['livros' => Livro::orderBy('id', 'desc')->paginate(5)]);
    }

    public function create(Request $request) {
        return view('livros.create');
    }

    public function store(Request $request) {
        $livro            = new Livro();
        $livro->nome      = $request->nome;
        $livro->autor     = $request->autor;
        $livro->isbn      = $request->isbn;
        $livro->save();

        return redirect()->route('livros.index');
    }

    public function edit(Request $request, $id) {
        $livro = Livro::findOrFail($id);
        return view('livros.edit', ['livro' => $livro]);
    }

    public function update(Request $request, $id) {
        $livro          = Livro::findOrFail($id);
        $livro->nome    = $request->nome;
        $livro->autor   = $request->autor;
        $livro->isbn    = $request->isbn;
        $livro->save();

        return redirect()->route('livros.index');
    }

    public function delete(Request $request, $id) {
        $livro = Livro::findOrFail($id);
        $emprestimos = Emprestimo::where('livro_id', $livro->id)->delete();

        $livro->delete();

        return redirect()->route('livros.index');
    }
}
