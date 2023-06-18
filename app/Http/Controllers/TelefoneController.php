<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telefone;
use App\Models\Aluno;

class TelefoneController extends Controller
{
    public function index(Request $request) {
        return view('telefones.index', ['telefones' => Telefone::orderBy('id', 'desc')->paginate(5)]);
    }

    public function create(Request $request) {
        return view('telefones.create', [
            'telefones' => Telefone::all(),
            'alunos' => Aluno::all()
        ]);
    }

    public function store(Request $request) {
        $telefone            = new Telefone();
        $telefone->nome      = $request->nome;
        $telefone->numero    = $request->numero;
        $telefone->aluno_id  = $request->aluno_id;
        $telefone->save();

        return redirect()->route('telefones.index');
    }

    public function edit(Request $request, $id) {
        $telefone = Telefone::findOrFail($id);
        $alunos = Aluno::all();
    
        return view('telefones.edit', ['telefone' => $telefone, 'alunos' => $alunos]);
    }

    public function update(Request $request, $id) {
        $telefone           = Telefone::findOrFail($id);
        $telefone->nome     = $request->nome;
        $telefone->numero   = $request->numero;
        $telefone->aluno_id = $request->aluno_id;
        $telefone->save();

        return redirect()->route('telefones.index');
    }

    public function delete(Request $request, $id) {
        $telefone = Telefone::findOrFail($id);
        $telefone->delete();

        return redirect()->route('telefones.index');
    }
}