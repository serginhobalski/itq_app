@extends('layouts.adm')

@section('estyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('CADASTRAR') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('avisos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="grupo" class="col-md-4 col-form-label text-md-end">{{ __('Grupo') }}</label>

                            <div class="col-md-6">
                                <select name="grupo" id="grupo" class="form-control">
                                    <option value="geral">GERAL</option>
                                    <option value="uetp">UETP</option>
                                    <option value="aluno_itq">Aluno ITQ</option>
                                    <option value="aluno_postulante">Postulante</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="icone" class="col-md-4 col-form-label text-md-end">{{ 'Mês' }}</label>
                            <div class="col-md-6">
                                <select name="icone" id="icone" class="form-control">
                                    <option value="<i class='fa-solid fa-bell'></i>">Sino</option>
                                    <option value="<i class='fa-solid fa-triangle-exclamation'></i>">Alerta</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="titulo" class="col-md-4 col-form-label text-md-end">{{ __('Título') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="titulo" id="titulo">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descricao" class="col-md-4 col-form-label text-md-end">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <textarea id="descricao" name="descricao" class="form-control"> </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imagem" class="col-md-4 col-form-label text-md-end">{{ __('Imagem') }}</label>

                            <div class="col-md-6">
                                <input id="imagem" class="form-control"  type="file" name="imagem" id="imagem" value="{{ old('Imagem') }}" autocomplete="imagem" accept=".jpg, .jpeg, .png, .gif, .pdf">
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar') }}
                                </button>
                                <a href="{{route('avisos.index')}}" class="btn btn-dark">
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
