@extends('layouts.adm')

@section('styles')
@endsection

@section('content')
    <div class="container">
        <p>
        <h1>{{ $titulo }} </h1>
        </p>
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{ $subtitulo }}
            </div>
            <div class="panel-body">
                <div id='calendar'></div>
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
                events: "listar_eventos",
                displayEventTime: false,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                // selectable: true,
                // selectHelper: true,
                // select: function(start, end, allDay) {
                //     var title = prompt('Título do Evento:');
                //     if (title) {
                //         var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                //         var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD');
                //         $.ajax({
                //             url: "{{ URL::to('criar_evento') }}",
                //             data: 'title=' + title + '&start=' + start + '&end=' + end +
                //                 '&_token=' + "{{ csrf_token() }}",
                //             type: "post",
                //             success: function(data) {
                //                 alert("Adicionado com sucesso!");
                //                 $('#calendar').fullCalendar('refetchEvents');
                //             }
                //         });
                //     }
                // },
                eventClick: function(event) {
                    // Populate modal with event details
                    $('#modalEvento .modal-title').text(event.title);
                    $('#modalEvento form[id="event-id"]').val(event.id);
                    $('#modalEvento input[name="event-id"]').val(event.id);
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
    <div id="modalEvento" class="modal fade bd-example-modal-lg radius-sm" tabindex="-1" role="dialog"
        aria-labelledby="modalEvento" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                        Detalhes do Evento
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-white" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row placeani">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <h3 class="modal-title" ></h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <div class="input-group">
                                            <label>Início: </label>
                                            <input id="start" type="text" class="form-control" name="event-start" autofocus readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <div class="input-group">
                                            <label>Fim: </label>
                                            <input id="end" type="text" class="form-control" name="event-end" autofocus readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button class="btn" type="submit">
                                            <i class="fa-solid fa-calendar-plus"></i> Editar
                                        </button>
                                        <form action="" method="post">
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fa-solid fa-calendar-xmark"></i> Deletar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
