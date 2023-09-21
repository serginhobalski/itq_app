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

    <!-- Áera do Calendário -->
    <div id="eventos" class="row section">
        <div class="col-lg-12 m-b30">
            <div class="container">
                <p>
                    <h3>Eventos </h3>
                </p>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Eventos Agendados
                    </div>
                    <div class="panel-body" >
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            locale: 'pt-br',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            navLinks: true,
            editable: true,
            eventLimit: true, // for all non-agenda views
            views: {
                agenda: {
                    eventLimit: 6 // adjust to 6 only for agendaWeek/agendaDay
                }
            },
            events: "{{ URL::to('eventos') }}",
            displayEventTime: false,
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            eventClick: function(event) {
                // Populate modal with event details
                $('#modalEvento .modal-title').text(event.title);
                $('#modalEvento .event-id').text(event.id);
                $('#modalEvento .event-description').text(event.description);
                $('#modalEvento .event-place').text(event.place);
                $('#modalEvento .event-address').text(event.address);
                $('#modalEvento .event-image').attr('src', 'storage/'+event.image);
                $('#modalEvento input[name="event-start"]').val(event.start.format('DD/MM/YYYY | HH:mm'));
                $('#modalEvento input[name="event-end"]').val(event.end.format('DD/MM/YYYY | HH:mm'));
                // Show the modal
                $('#modalEvento').modal('show');
            }
        });
    });
</script>
@endsection


@section('modal')
    <!-- Modal Evento -->
    <div class="modal fade" id="modalEvento" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{-- <div class="col-lg-12"><img class="event-image" src="" alt=""></div> --}}
                    <div class="col-lg-12"><p class="event-description"></p></div>
                    <hr>
                    <div class="col-lg-12"><h5 class="event-place"></h5></div>
                    <div class="col-lg-12"><p class="event-address"></p></div>
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <div class="input-group">
                                <label>Início: </label>
                                <input id="start" type="text" class="form-control event-start" name="event-start" autofocus readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <div class="input-group">
                                <label>Fim: </label>
                                <input id="end" type="text" class="form-control event-end" name="event-end" autofocus readonly>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
