<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\EmprestimoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
    return view('welcome');
});

Route::get('/alunos',               [AlunoController::class, 'index'])->name('alunos.index');
Route::get('/alunos/create',        [AlunoController::class, 'create'])->name('alunos.create');
Route::post('/alunos/create',       [AlunoController::class, 'store'])->name('alunos.store');
Route::get('/alunos/edit/{id}',     [AlunoController::class, 'edit'])->name('alunos.edit');
Route::post('/alunos/update/{id}',  [AlunoController::class, 'update'])->name('alunos.update');
Route::get('/alunos/delete/{id}',   [AlunoController::class, 'delete'])->name('alunos.delete');

Route::get('/livros',               [LivroController::class, 'index'])->name('livros.index');
Route::get('/livros/create',        [LivroController::class, 'create'])->name('livros.create');
Route::post('/livros/create',       [LivroController::class, 'store'])->name('livros.store');
Route::get('/livros/edit/{id}',     [LivroController::class, 'edit'])->name('livros.edit');
Route::post('/livros/update/{id}',  [LivroController::class, 'update'])->name('livros.update');
Route::get('/livros/delete/{id}',   [LivroController::class, 'delete'])->name('livros.delete');

Route::get('/telefones',                [TelefoneController::class, 'index'])->name('telefones.index');
Route::get('/telefones/create',         [TelefoneController::class, 'create'])->name('telefones.create');
Route::post('/telefones/create',        [TelefoneController::class, 'store'])->name('telefones.store');
Route::get('/telefones/edit/{id}',      [TelefoneController::class, 'edit'])->name('telefones.edit');
Route::post('/telefones/update/{id}',   [TelefoneController::class, 'update'])->name('telefones.update');
Route::get('/telefones/delete/{id}',    [TelefoneController::class, 'delete'])->name('telefones.delete');

Route::get('/emprestimos',                                [EmprestimoController::class, 'index'])->name('emprestimos.index');
Route::get('/emprestimos/create',                         [EmprestimoController::class, 'create'])->name('emprestimos.create');
Route::post('/emprestimos/create',                        [EmprestimoController::class, 'store'])->name('emprestimos.store');
Route::get('/emprestimos/edit/{aluno_id}/{livro_id}',     [EmprestimoController::class, 'edit'])->name('emprestimos.edit');
Route::post('/emprestimos/update/{aluno_id}/{livro_id}',  [EmprestimoController::class, 'update'])->name('emprestimos.update');
Route::get('/emprestimos/delete/{aluno_id}/{livro_id}',   [EmprestimoController::class, 'delete'])->name('emprestimos.delete');

Route::get('/teste', [TesteController::class, 'teste'])->name('teste');
