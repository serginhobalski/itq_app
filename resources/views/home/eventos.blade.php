@extends('layouts.base-site')

@section('styles')
@endsection


@section('content')
@include('site._page-header')
<div class="content-block">
    <!-- Portfolio  -->
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
              <button type="button" class="btn btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                ×
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12"><img class="event-image" src="" alt=""></div>
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
