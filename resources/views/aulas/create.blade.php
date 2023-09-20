@extends('layouts.adm')

@section('estyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('CADASTRAR AULA') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('aulas.store') }}" enctype="multipart/form-data">
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
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Curso">
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="descricao">Descrição</label>
                            <div class="summernote">
                                <textarea id="descricao" name="descricao" class="form-control" placeholder="Descrição da Aula"> </textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="imagem">Imagem da Aula</label>
                            <input id="imagem" class="form-control"  type="file" name="imagem" id="imagem" value="{{ old('Imagem') }}" autocomplete="imagem" accept=".jpg, .jpeg, .png, .gif, .pdf" placeholder="Imagem da Aula">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="ch" class="col-md-4 col-form-label text-md-end">{{ __('Carga Horária') }}</label>
                                <input type="text" name="ch" id="ch" class="form-control" placeholder="Carga Horária">
                            </div>
                            <div class="col-md-4">
                                <label for="link" class="col-md-4 col-form-label text-md-end">{{ __('Link da aula') }}</label>
                                <input type="text" name="link" id="link" class="form-control" placeholder="Link">
                            </div>
                            <div class="col-md-4">
                                <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código') }}</label>
                                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código">
                            </div>

                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar') }}
                                </button>
                                <a href="{{route('aulas.index')}}" class="btn btn-dark">
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
