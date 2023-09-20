@extends('layouts.adm')

@section('estyles')
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center bg-primary">
                    <h3>{{ __('CADASTRAR ALUNOS EM CURSO') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('alunos_cursos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="curso_id" class="col-md-4 col-form-label text-md-end">{{ __('Curso') }}</label>
                                <select name="curso_id" id="curso_id" class="form-control">
                                    @foreach ($cursos as $curso)
                                    <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="aluno_id" class="col-md-4 col-form-label text-md-end">{{ __('Aluno(s)') }}</label>
                                <select name="aluno_id[]" id="aluno_id" class="form-control" multiple>
                                    @foreach ($alunos as $aluno)
                                    <option value="{{$aluno->id}}">
                                        {{$aluno->name}} {{$aluno->surname}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Cadastrar') }}
                                </button>
                                <a href="{{route('alunos_cursos.index')}}" class="btn btn-dark">
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
<script>
    $(function () {
      $("select").selectize(options);
    });
</script>
@endsection
