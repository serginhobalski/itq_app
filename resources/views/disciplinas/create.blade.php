@extends('layouts.adm')

@section('estyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('CADASTRAR DISCIPLINA') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('disciplinas.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="curso_id">Curso / Módulo</label>
                                <select name="curso_id" id="curso_id" class="form-control">
                                    @foreach ($cursos as $curso)
                                        <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Disciplina">
                            </div>

                        </div>

                        <div class="form-group col-md-12">
                            <label for="descricao">Descrição</label>
                            <div class="summernote">
                                <textarea id="descricao" name="descricao" class="form-control" placeholder="Descrição do Curso"> </textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="imagem">Imagem da Disciplina</label>
                            <input id="imagem" class="form-control"  type="file" name="imagem" id="imagem" value="{{ old('Imagem') }}" autocomplete="imagem" accept=".jpg, .jpeg, .png, .gif, .pdf" placeholder="Imagem do Curso">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ch" class="col-md-4 col-form-label text-md-end">{{ __('CH') }}</label>
                                <input name="ch" id="ch" class="form-control" type="text">
                            </div>
                            <div class="col-md-6">
                                <label for="link" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>
                                <input name="link" id="link" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código') }}</label>
                                <input name="codigo" id="codigo" class="form-control" type="text">
                            </div>
                            <div class="col-md-6">
                                <label for="modulo" class="col-md-4 col-form-label text-md-end">{{ __('Módulo') }}</label>
                                <input name="modulo" id="modulo" class="form-control" type="text">
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
