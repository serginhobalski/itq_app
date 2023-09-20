@extends('layouts.adm')

@section('estyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('CADASTRAR CURSO') }}</h3>
                </div>

                <div class="card-body">

                    <h3>Nome: {{ $curso->nome }}</h3>
                    <hr>
                    <p>Descrição: {{ $curso->descricao }}</p>
                    <hr>
                    @if ($curso->imagem)
                    <img src="{{ asset('storage/' . $curso->imagem) }}" alt="" width="100%">
                    @else
                    <img src="{{ asset('storage') }}/cursos/{{ $curso->id }}.jpg" alt="" width="100%">
                    @endif
                    <hr>
                    <h4>Categoria: {{ strtoupper($curso->categoria) }}</h4>
                    <h4>Status: {{ ($curso->ativo == true ? 'Ativo' : 'Inativo') }}</h4>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{route('cursos.index')}}" class="btn btn-dark">
                                <i class="fa-solid fa-arrow-left"></i> Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
