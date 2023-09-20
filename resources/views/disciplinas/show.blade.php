@extends('layouts.adm')

@section('estyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('DETALHES DA DISCIPLINA') }}</h3>
                </div>

                <div class="card-body">

                    <h3>Disciplina: {{ $disciplina->nome }}</h3>
                    <hr>
                    <p>Descrição: {{ $disciplina->descricao }}</p>
                    <hr>
                    @if ($disciplina->imagem)
                    <img src="{{ asset('storage/' . $disciplina->imagem) }}" alt="" width="100%">
                    @else
                    <img src="{{ asset('storage') }}/disciplinas/{{ $disciplina->id }}.jpg" alt="" width="100%">
                    @endif
                    <hr>
                    <h4>Módulo: {{ strtoupper($disciplina->modulo) }}</h4>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('Aulas de ') . $disciplina->nome }}</h3>
                </div>

                <div class="card-body">
                    @if (!$aulas)
                        <p>Nenhuma aula cadastrada.</p>
                    @else
                        <table>
                            <thead>
                                <tr>
                                    <th>Aula</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aulas as $aula)
                                <tr>
                                    <td>{{$aula->nome}}</td>
                                    <td>{{$aula->link}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <hr>
                    <form method="POST" action="{{ route('store_aula') }}" enctype="multipart/form-data">
                        @csrf
                        <h4>Cadastrar Nova Aula</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input name="disciplina_id" type="text" readonly value="{{$disciplina->id}}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Aula">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="link" id="link" class="form-control" placeholder="Link">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar Aula') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('PDFs de ') . $disciplina->nome }}</h3>
                </div>

                <div class="card-body">
                    @if (!$pdfs)
                        <p>Nenhum PDF cadastrado.</p>
                    @else
                        <table>
                            <thead>
                                <tr>
                                    <th>PDF</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pdfs as $pdf)
                                <tr>
                                    <td>{{$pdf->nome}}</td>
                                    <td>{{$pdf->link}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <hr>
                    <form method="POST" action="{{ route('store_pdf') }}" enctype="multipart/form-data">
                        @csrf
                        <h4>Cadastrar Novo PDF</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input name="disciplina_id" type="text" readonly value="{{$disciplina->id}}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do PDF">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="link" id="link" class="form-control" placeholder="Link">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar PDF') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('Atividades de ') . $disciplina->nome }}</h3>
                </div>

                <div class="card-body">
                    @if (!$atividades)
                        <p>Nenhuma atividade cadastrada.</p>
                    @else
                        <table>
                            <thead>
                                <tr>
                                    <th>Atividade</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atividades as $atividade)
                                <tr>
                                    <td>{{$atividade->nome}}</td>
                                    <td>{{$atividade->link}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <hr>
                    <form method="POST" action="{{ route('store_atividade') }}" enctype="multipart/form-data">
                        @csrf
                        <h4>Cadastrar Nova Atividade</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input name="disciplina_id" type="text" readonly value="{{$disciplina->id}}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da atividade">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="link" id="link" class="form-control" placeholder="Link">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar Atividade') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('Alunos de ') . $disciplina->nome }}</h3>
                </div>

                <div class="card-body">
                    @if (!$alunos)
                        <p>Nenhum aluno cadastrado.</p>
                    @else
                        <table>
                            <thead>
                                <tr>
                                    <th>Nome do(a) aluno(a)</th>
                                    <th>E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alunos as $aluno)
                                <tr>
                                    <td>{{$aluno->name}}</td>
                                    <td>{{$aluno->email}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <hr>
                    <form method="POST" action="{{ route('store_aluno') }}" enctype="multipart/form-data">
                        @csrf
                        <h4>Cadastrar Novo Aluno</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input name="curso_id" type="text" readonly value="{{$disciplina->curso_id}}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <select name="aluno_id" id="" class="form-control">
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar Aluno') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('Notas dos Alunos') }}</h3>
                </div>

                <div class="card-body">
                    @if (!$notas)
                        <p>Nenhuma nota cadastrada.</p>
                    @else
                        <table>
                            <thead>
                                <tr>
                                    <th>Nome do(a) aluno(a)</th>
                                    <th>Atividade</th>
                                    <th>nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notas as $nota)
                                <tr>
                                    <td>{{$nota->aluno}}</td>
                                    <td>{{$nota->nome}}</td>
                                    <td>{{$nota->nota}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <hr>
                    <form method="POST" action="{{ route('store_nota') }}" enctype="multipart/form-data">
                        @csrf
                        <h4>Cadastrar Nota de Aluno</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input name="disciplina_id" type="text" readonly value="{{$disciplina->id}}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <select name="user_id" id="" class="form-control">
                                    @foreach ($alunos as $aluno)
                                        <option value="{{$aluno->user_id}}">{{$aluno->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <select name="nome" id="" class="form-control">
                                    @foreach ($atividades as $atividade)
                                        <option value="{{$atividade->nome}}">{{$atividade->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input name="nota" type="text" placeholder="Lançar Nota" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar Nota') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <a href="{{route('disciplinas.index')}}" class="btn btn-dark">
                        <i class="fa-solid fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
