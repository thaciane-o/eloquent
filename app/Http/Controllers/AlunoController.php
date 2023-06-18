<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Telefone;
use App\Models\Emprestimo;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Request $request) {
        return view('alunos.index', ['alunos' => Aluno::orderBy('id', 'desc')->paginate(5)]);
    }

    public function create(Request $request) {
        return view('alunos.create');
    }

    public function store(Request $request) {
        $obj            = new Aluno();
        $obj->nome      = $request->nome;
        $obj->matricula = $request->matricula;
        $obj->endereco  = $request->endereco;
        $obj->save();

        return redirect()->route('alunos.index');
    }

    public function edit(Request $request, $id) {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', ['aluno' => $aluno]);
    }

    public function update(Request $request, $id) {
        $obj            = Aluno::findOrFail($id);
        $obj->nome      = $request->nome;
        $obj->matricula = $request->matricula;
        $obj->endereco  = $request->endereco;
        $obj->save();

        return redirect()->route('alunos.index');
    }

    public function delete(Request $request, $id) {
        $obj = Aluno::findOrFail($id);
        $telefones = Telefone::where('aluno_id', $obj->id)->get();
        $emprestimos = Emprestimo::where('aluno_id', $obj->id)->delete();

        if(!$telefones->isEmpty()) {
            foreach ($telefones as $telefone) {
                $telefone->delete();
            }
        }

        $obj->delete();

        return redirect()->route('alunos.index');
    }
}
