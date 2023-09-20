@extends('layouts.edu')

<!-- Custom styles -->
@section('estilos')
@endsection

<!-- Page content -->
@section('content')
    @include('itq._header_painel')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 hidden-sm hidden-xs">
                    <div class="custom-module">
                        <img src="{{ asset('edu/images/sobre.jpg') }}" alt="" class="img-responsive wow slideInLeft">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="custom-module p40l">
                        <h2 class="text-white">O <mark>ITQ EAD</mark> tem como missão<br>
                            capacitar e equipar vidas para servir com<br>
                            excelência o Reino de Deus.</h2>

                        <p>Somos uma escola vocacional que tem o objetivo de preparar líderes e pastores que atuam na Igreja
                            do Evanelho Quadrangular.</p>

                        <hr class="invis">

                    </div>

                    <div class="section-title text-center">
                        <h3>Meus Módulos / Cursos</h3>
                    </div>

                    @foreach ($aluno_cursos as $curso)
                    <div class="col-md-4" style="margin-bottom: 15px;">
                        <div class="caro-item">
                            <div class="course-box">
                                <div class="image-wrap entry">
                                    <img src="{{asset('edu/upload/cursos/' . $curso->id . '.jpg')}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                        <a href="{{ url('curso/' . $curso->id) }}" title=""><i class="flaticon-add"></i></a>
                                    </div>
                                </div>
                                <div class="course-details">
                                    <small>
                                        <a style="color:orange" href="{{ url('curso/' . $curso->id) }}" title="{{ $curso->nome }}">
                                            {{ $curso->nome }}
                                        </a>
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section bgcolor1">
        <div class="container">
            <a href="#">
                <div class="row callout">
                    <div class="col-md-4 text-center">
                        <h4>nossos</h4>
                        <h3><sup></sup>Valores</h3>
                    </div>

                    <div class="col-md-8">
                        <p class="lead">Fidelidade no ensino da Palavra de Deus, integridade em todas as nossas ações e
                            compromisso com a excelência do ensino bíblico-teológico.</p>
                    </div>
                </div><!-- end row -->
            </a>
        </div><!-- end container -->
    </section>
@endsection


<!-- Custom scripts -->
@section('scripts')
@endsection
