<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mini BIB</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">Mini BIB :P</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        {{-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> --}}
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-primary bg-gradient text-white mt-3 pt-5 pb-2">
            <div class="container px-4 text-center">
            <h1 class="fw-bolder">Editando o empréstimo do livro: {{ $emprestimo->livro->nome }} feito pelo aluno {{ $emprestimo->aluno->nome }}</h1>
                {{-- <p class="lead">A functional Bootstrap 5 boilerplate for one page scrolling websites</p>
                <a class="btn btn-lg btn-light" href="#about">Start scrolling!</a> --}}
            </div>
        </header>

        <section id="about" class="p-2 m-2">
            <div class="container px-4">
                <div>
                    <a href="{{ route('emprestimos.index') }}">
                        <button class="btn btn-sm btn-secondary">Voltar</button>
                    </a>
                </div>

                <form class="mt-3" action="{{ route('emprestimos.update', [$emprestimo->aluno_id, $emprestimo->livro_id]) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <select class="form-select" name="aluno_id" aria-label="Default select example">
                            @foreach ($alunos as $aluno)
                                <option value="{{ $aluno->id }}" @if ($aluno->id === $emprestimo->aluno_id) selected @endif>
                                    {{ $aluno->id }} - {{ $aluno->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="livro_id" aria-label="Default select example">
                            @foreach ($livros as $livro)
                                <option value="{{ $livro->id }}" @if ($livro->id === $emprestimo->livro_id) selected @endif>
                                    {{ $livro->id }} - {{ $livro->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control" name="datahora" id="datahora" placeholder="Data e hora do empréstimo" value="{{ $emprestimo->datahora }}">
                        <label for="floatingInput">Data e hora do empréstimo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control" name="data_devolucao" id="data_devolucao" placeholder="Data e hora da devolução" value="{{ $emprestimo->data_devolucao }}">
                        <label for="floatingInput">Data e hora da devolução</label>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Salvar" />
                </form>
            </div>
        </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
