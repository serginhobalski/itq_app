@extends('layouts.itq')

@section('styles')
@endsection

@section('header')
<!-- header -->
<header class="banner">
    <div class="banner__contents">
        @include('components.flash-message')
        <h1 class="banner__title">{{ $titulo }}</h1>
        <h3>{{ $subtitulo }} </h3>
        <div class="banner__buttons">
        <button class="banner__button">Painel</button>
        <button class="banner__button">Minha Lista</button>
        </div>
        <h1 class="banner__description">
            {{ $subtitulo }}
        </h1>
    </div>
    {{-- <div class="banner--fadeBottom"></div> --}}
    {{-- <div class="btn-wrapper">
        <div class="text-center">
            <a href="{{url('home')}}" class="btn btn-primary wow slideInLeft" style="visibility: visible; animation-name: slideInLeft;">Painel</a> &nbsp;&nbsp;&nbsp;
            <a href="{{url('cursos')}}" class="btn btn-default wow slideInRight" style="visibility: visible; animation-name: slideInRight;">Cursos</a>
        </div>
    </div> --}}
</header>
@endsection

@section('content')
<!-- Módulos do Aluno -->
<div class="row bg-dark p-0">
    <div class="col-12">
        <h2>MEUS MÓDULOS</h2>
        <div class="row__posters owl-carousel owl-theme d-flex">
            @if (!$cursos)

            @else
                @foreach ($cursos as $curso)
                <div class="item">
                    <img class="row__poster row__posterLarge" src="{{asset('src/itq')}}/imagens/{{$curso->id}}.jpg" alt="" title="{{$curso->nome}}" />
                </div>
                @endforeach
            @endif

        </div>
    </div>
</div>

<!-- Módulos 1º ano -->
<div class="row bg-dark">
  <h2>Módulos | 1º ANO</h2>
  <div class="row__posters owl-carousel owl-theme d-flex">
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m1.jpg"
            alt="Nome do Curso" title="Nome do Curso" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m2.jpg"
            alt="Nome do Curso" title="Nome do Curso" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m3.jpg"
            alt="Nome do Curso" title="Nome do Curso" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m4.jpg"
            alt="Nome do Curso" title="Nome do Curso" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m5.jpg"
            alt="Nome do Curso" title="Nome do Curso" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m6.jpg"
            alt="Nome do Curso" title="Nome do Curso" />
        </div>
  </div>
</div>

<!-- Módulos 2º ano -->
<div class="row bg-dark">
  <h2>Módulos | 2º ANO</h2>
  <div class="row__posters owl-carousel owl-theme d-flex">
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m7.jpg"
            alt="Curso do 2º ano" title="Curso do 2º ano" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m8.jpg"
            alt="Curso do 2º ano" title="Curso do 2º ano" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m9.jpg"
            alt="Curso do 2º ano" title="Curso do 2º ano" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m10.jpg"
            alt="Curso do 2º ano" title="Curso do 2º ano" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m11.jpg"
            alt="Curso do 2º ano" title="Curso do 2º ano" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m12.jpg"
            alt="Curso do 2º ano" title="Curso do 2º ano" />
        </div>
  </div>
</div>

<!-- Módulos 3º ano -->
<div class="row bg-dark">
  <h2>Módulos | 3º ANO</h2>
  <div class="row__posters owl-carousel owl-theme d-flex">
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m13.jpg"
            alt="Curso do 3º ano do ITQ" title="Curso do 3º ano do ITQ" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m14.jpg"
            alt="Curso do 3º ano do ITQ" title="Curso do 3º ano do ITQ" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m15.jpg"
            alt="Curso do 3º ano do ITQ" title="Curso do 3º ano do ITQ" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m16.jpg"
            alt="Curso do 3º ano do ITQ" title="Curso do 3º ano do ITQ" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m17.jpg"
            alt="Curso do 3º ano do ITQ" title="Curso do 3º ano do ITQ" />
        </div>
        <div class="item">
            <img class="row__poster"
            src="{{asset('src/itq')}}/imagens/m18.jpg"
            alt="Curso do 3º ano do ITQ" title="Curso do 3º ano do ITQ" />
        </div>
  </div>
</div>
@endsection


@section('scripts')
@endsection
