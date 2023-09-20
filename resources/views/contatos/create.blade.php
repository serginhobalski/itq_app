@extends('layouts.adm')

@section('estyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('CADASTRAR CONTATO') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contatos.store') }}" >
                        @csrf

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>
                            <input type="text" name="nome" id="nome" class="form-control">
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>
                            <input type="mail" name="email" id="email" class="form-control">
                        </div>

                        <div class="row mb-3">
                            <label for="assunto" class="col-md-4 col-form-label text-md-end">{{ 'Assunto' }}</label>
                            <div class="col-md-6">
                                <select name="assunto" id="assunto" class="form-control" required>
                                    <option value="Contato">Contato</option>
                                    <option value="Treinamento">Treinamento</option>
                                    <option value="Evento">Evento</option>
                                    <option value="Dúvida">Dúvida</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <label>Mensagem</label>
                                    <textarea name="mensagem" rows="4" class="form-control" required=""></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="assunto" class="col-md-4 col-form-label text-md-end">{{ 'Status' }}</label>
                            <div class="col-md-6">
                                <select name="assunto" id="assunto" class="form-control" required>
                                    <option value="0">Pendente</option>
                                    <option value="1">Atendido</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar') }}
                                </button>
                                <a href="{{route('contatos.index')}}" class="btn btn-dark">
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
