@extends('layouts.adm')

@section('estyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('ATUALIZAR DISCIPLINA') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('disciplinas.update', $disciplina->id) }}" enctype="multipart/form-data">
                        @csrf @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="curso_id">Curso / Módulo</label>
                                <input name="curso_id" id="curso_id" class="form-control" type="text"  value="{{$disciplina->curso_id}}">
                            </div>
                            <div class="col-md-6">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="{{$disciplina->nome}}">
                            </div>

                        </div>

                        <div class="form-group col-md-12">
                            <label for="descricao">Descrição</label>
                            <div class="summernote">
                                <textarea id="descricao" name="descricao" class="form-control" value="">
                                {{$disciplina->descricao}}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="imagem">Imagem da Disciplina</label>
                            <img src="{{asset('storage/'.$disciplina->imagem)}}" alt="" width="50%">
                            <input id="imagem" class="form-control"  type="file" name="imagem" id="imagem" value="{{$disciplina->imagem}}" autocomplete="imagem" accept=".jpg, .jpeg, .png, .gif, .pdf" placeholder="Imagem do Curso">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ch" class="col-md-4 col-form-label text-md-end">{{ __('CH') }}</label>
                                <input name="ch" id="ch" class="form-control" type="text" value="{{$disciplina->ch}}">
                            </div>
                            <div class="col-md-6">
                                <label for="link" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>
                                <input name="link" id="link" class="form-control" type="text" value="{{$disciplina->link}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código') }}</label>
                                <input name="codigo" id="codigo" class="form-control" type="text" value="{{$disciplina->codigo}}">
                            </div>
                            <div class="col-md-6">
                                <label for="modulo" class="col-md-4 col-form-label text-md-end">{{ __('Módulo') }}</label>
                                <input name="modulo" id="modulo" class="form-control" type="text" value="{{$disciplina->modulo}}">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar') }}
                                </button>
                                <a href="{{route('disciplinas.index')}}" class="btn btn-dark">
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
