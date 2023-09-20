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
                            <h3> {{ Auth::user()->name }} </h3>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6 text-right">
                        <ul class="breadcrumb">
                            <li><a href="#"></a></li>
                            {{-- <li>Módulo</li> --}}
                            <li class="active">{{ Auth::user()->email }}</li>
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
                                <a data-toggle="tab" href="#dados">Meus Dados</a>
                              </li>
                              <li>
                                <a data-toggle="tab" href="#modulos"
                                  >Meus Módulos / Cursos</a
                                >
                              </li>
                              <li>
                                <a data-toggle="tab" href="#notas"
                                  >Minhas Notas</a
                                >
                              </li>
                            </ul>

                            <div class="tab-content">
                              <div id="dados" class="tab-pane fade in active">
                                <h3> {{ Auth::user()->name . ' ' . Auth::user()->surname}} </h3>

                                <p>
                                  {{Auth::user()->username}}
                                  <br>
                                  {{Auth::user()->email}}
                                  <br>
                                  Cadastrado em: {{ date('d/m/Y | H:i', strtotime(Auth::user()->created_at)) }}
                                  <br>
                                  <hr>
                                    <strong style="color: #fff;" >
                                        Grupo: {{ strtoupper(Auth::user()->group) }}
                                    </strong>
                                </p>
                              </div>
                              <div id="modulos" class="tab-pane fade">
                                <h2>Módulos</h2>
                                <hr>
                                <ul>
                                    @foreach ($aluno_cursos as $curso)
                                    <li> <a style="color:#fff" href="{{url('curso/'.$curso->id)}}">{{$curso->nome}}</a> </li>
                                    @endforeach
                                </ul>
                              </div>
                              <div id="notas" class="tab-pane fade">
                                <h2>Notas</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Atividade </th>
                                            <th>Nota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notas as $nota)
                                        <tr>
                                            <td>{{$nota->nome}}</td>
                                            <td>{{$nota->nota}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
