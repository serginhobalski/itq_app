@extends('layouts.adm')

@section('estyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('CADASTRAR NOTA') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('notas.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="disciplina_id">Disciplina</label>
                                <select name="disciplina_id" id="disciplina_id">
                                    @foreach ($disciplinas as $disciplina)
                                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="user_id">Aluno</label>
                                <select name="user_id" id="user_id">
                                    @foreach ($alunos as $aluno)
                                    <option value="{{$aluno->id}}">{{$aluno->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nome" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>
                                <select name="nome" id="nome">
                                    @foreach ($atividades as $atividade)
                                    <option value="{{$atividade->nome}}">{{$atividade->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nota" class="col-md-4 col-form-label text-md-end">{{ __('Nota') }}</label>
                                <input type="text" name="nota" id="nota" class="form-control" placeholder="*Utilize ponto(.) no lugar da vírgula! ">
                            </div>

                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar') }}
                                </button>
                                <a href="{{route('notas.index')}}" class="btn btn-dark">
                                    <i class="fa-solid fa-arrow-left"></i> Voltar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
