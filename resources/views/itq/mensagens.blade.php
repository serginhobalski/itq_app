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
    <div class="banner--fadeBottom"></div>
</header>
@endsection

@section('content')

@endsection


@section('scripts')
@endsection
