@extends('layouts.edu')

<!-- Custom styles -->
@section('estilos')
@endsection

<!-- Page content -->
@section('content')
    @include('itq._header_page')

    <div id="wrapper">

        <section class="section cb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mt-4">
                        <div class="tagline-message page-title">
                            <h3> {{ $curso->nome }} </h3>
                        </div>
                    </div>

                    <div class="col-md-6 text-right">
                        <ul class="breadcrumb">
                            <li><a href="#">Módulo</a></li>
                            <li class="active">{{ $curso->codigo }}</li>
                        </ul>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end section -->

        <section class="section">
            <div class="container">
                <div class=" ">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="shop-extra">
                            <ul class="nav nav-tabs">
                              <li class="active">
                                <a data-toggle="tab" href="#home">Descrição</a>
                              </li>
                              <li>
                                <a data-toggle="tab" href="#pdf"
                                  >PDF</a
                                >
                              </li>
                              <li>
                                <a data-toggle="tab" href="#menu1"
                                  >Aulas</a
                                >
                              </li>
                              <li><a data-toggle="tab" href="#menu2">Atividades Avaliativas</a></li>
                            </ul>

                            <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                <h3> {{$disciplina->nome}} </h3>

                                <p>
                                  {{$disciplina->descricao}}
                                  <br>
                                  <hr>
                                    <strong style="color: #fff;" >
                                        Módulo (código): {{$curso->codigo}}
                                    </strong>
                                </p>
                              </div>
                              <div id="pdf" class="tab-pane fade">
                                <h2>PDF</h2>
                                <hr>

                                @if (count($pdfs) == 0)
                                    <strong style="color:#fff;">
                                        Nenhum conteúdo encontrado.
                                    </strong>
                                @else
                                    @foreach ($pdfs as $pdf)
                                    <hr>
                                    <h4 class="text-warning"> {{$pdf->nome}} </h4>
                                    <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                                        <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;" frameborder="0" type="text/html" src="https://drive.google.com/file/d/{{$pdf->codigo}}/preview" width="100%" height="100%" allowfullscreen="" allow="autoplay">
                                        </iframe>
                                    </div>
                                    <hr>
                                    @endforeach
                                @endif
                              </div>
                              <div id="menu1" class="tab-pane fade">
                                <h2>Aulas</h2>
                                <hr>

                                @if (count($aulas) == 0)
                                    <p>
                                        <strong style="color:#fff;">
                                            Nenhum conteúdo encontrado.
                                        </strong>
                                    </p>
                                @else
                                    @foreach ($aulas as $aula)
                                    <hr>
                                    <h4 class="text-warning"> {{$aula->nome}} </h4>
                                    <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                                        <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;" frameborder="0" type="text/html" src="https://www.youtube.com/embed/{{$aula->codigo}}" width="100%" height="100%" allowfullscreen="" allow="autoplay">
                                        </iframe>
                                    </div>
                                    <hr>
                                    @endforeach
                                @endif
                              </div>
                              <div id="menu2" class="tab-pane fade">
                                <h3>Atividades Avaliativas</h3>

                                <p>
                                  Acesse os formulários de atividades clicando nos respectivos botões abaixo.
                                </p>

                                <div class="rating">
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                </div>

                                <hr class="invis" />

                                @foreach ($atividades as $atividade)
                                <hr>
                                    <a class="btn btn-primary" href="{{$atividade->link}}" target="_blank">
                                        {{ $atividade->nome }}
                                    </a>
                                <hr>
                                @endforeach

                              </div>
                            </div>
                          </div>
                          <!-- end shop-extra -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>

                <hr class="invis" />

            </div>
        </section>

    </div>
@endsection


<!-- Custom scripts -->
@section('scripts')
@endsection
