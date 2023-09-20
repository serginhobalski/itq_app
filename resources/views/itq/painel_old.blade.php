@extends('layouts.itq')

@section('styles')
@endsection

@section('header')
@endsection

@section('content')
<div class="content-block mt-4">
    @include('itq._page-header')

    <div class="section-area section-sp2 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-dark text-white text-center">
                            <h5><i class="fa-solid fa-address-card"></i> {{$usuario->name}}</h5>
                        </div>
                        <div class="card-body">
                            <h5><i class="fa-solid fa-circle-user"></i> {{$usuario->username}}</h5>
                            <h5><i class="fa-solid fa-envelope"></i> {{$usuario->email}}</h5>
                            <h5><i class="fa-solid fa-clipboard-user"></i> {{strtoupper($usuario->group)}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header bg-dark text-white">
                            <h5><i class="fa-solid fa-image-portrait"></i> Imagem</h5>
                        </div>
                        <div class="card-body text-center d-flex">
                            @if (!$usuario->image)
                            <img src="{{asset('src/itq/imagens/avatar.png')}}" width="100px" alt="">
                            @else
                            <img src="{{$usuario->image}}" width="100px" alt="">
                            @endif
                            <form action="{{url('adm/updateimage/').'/'.$usuario->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="file" name="image" id="image">
                                <button class="btn" type="submit"><i class="fa-solid fa-arrows-rotate"></i> Alterar imagem</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses -->
    <div class="section-area section-sp2 popular-courses-bx bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx left">
                    <h2 class="title-head text-white">Cursos</h2>
                </div>
            </div>

            <div class="row">
                <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">

                    @foreach ($cursos as $curso)
                    <div class="item">
                        <div class="cours-bx">
                            <div class="action-box">
                                <img src="{{ asset('src') }}/itq/imagens/m{{$curso->id}}.jpg" alt="" title="{{ $curso->nome }}">
                                <a href="#" class="btn"><i class="fa-solid fa-book-open"></i> Acessar</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@section('scripts')
@endsection
