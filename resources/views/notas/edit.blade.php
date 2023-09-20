@extends('layouts.adm')

@section('estyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('Atualizar Nota de ' . $aluno->name . ' ' . $aluno->surname) }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('notas.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="disciplina_id">Disciplina</label>
                                <input name="disciplina_id" id="disciplina_id" class="form-control" type="text" value="{{$nota->disciplina_id}}">
                            </div>
                            <div class="col-md-6">
                                <label for="user_id">ID do Aluno</label>
                                <input name="user_id" id="user_id" class="form-control" type="text" value="{{$nota->user_id}}">
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nome" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>
                                <input name="nome" id="nome" class="form-control" type="text" value="{{$nota->nome}}">
                            </div>
                            <div class="col-md-6">
                                <label for="nota" class="col-md-4 col-form-label text-md-end">{{ __('Nota') }}</label>
                                <input name="nota" id="nota" class="form-control" type="text" value="{{$nota->nota}}">
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
