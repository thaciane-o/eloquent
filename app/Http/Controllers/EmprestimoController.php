<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\Aluno;
use App\Models\Livro;

class EmprestimoController extends Controller
{
    public function index() {
        return view('emprestimos.index', ['emprestimos' => Emprestimo::orderBy('aluno_id', 'desc')->paginate(5)]);
    }

    public function create(Request $request) {
        return view('emprestimos.create', [
            'emprestimos' => Emprestimo::all(),
            'alunos' => Aluno::all(),
            'livros' => Livro::all()
        ]);
    }

    public function store(Request $request) {
        $emprestimo                 = new Emprestimo();
        $emprestimo->aluno_id       = $request->aluno_id;
        $emprestimo->livro_id       = $request->livro_id;
        $emprestimo->datahora       = $request->datahora;
        $emprestimo->data_devolucao = $request->data_devolução;
        $emprestimo->save();

        return redirect()->route('emprestimos.index');
    }

    public function edit(Request $request, $aluno_id, $livro_id) {
        $emprestimo = Emprestimo::where('aluno_id', $aluno_id)
                                ->where('livro_id', $livro_id)
                                ->first();
        $alunos = Aluno::all();
        $livros = Livro::all();
    
        return view('emprestimos.edit', ['emprestimo' => $emprestimo, 'alunos' => $alunos, 'livros' => $livros]);
    }
    
    public function update(Request $request, $aluno_id, $livro_id) {
        $data_devolucao = date('Y-m-d H:i:s', strtotime($request->data_devolucao));

        $emprestimo = Emprestimo::where('aluno_id', $aluno_id)
                                ->where('livro_id', $livro_id)
                                ->update([
                                    'aluno_id' => $request->aluno_id,
                                    'livro_id' => $request->livro_id,
                                    'datahora' => $request->datahora,
                                    'data_devolucao' => $data_devolucao
                                ]);

        return redirect()->route('emprestimos.index');
    }

    public function delete(Request $request, $aluno_id, $livro_id) {
        $emprestimo = Emprestimo::where('aluno_id', $aluno_id)
                                ->where('livro_id', $livro_id)
                                ->delete();
                                
        return redirect()->route('emprestimos.index');
    }
}