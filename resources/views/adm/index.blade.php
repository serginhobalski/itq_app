@extends('layouts.adm')


@section('styles')
@endsection


@section('content')
<!-- Área de Cards -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-12">
            <div class="widget-card widget-bg2">
                <div class="wc-item">
                    <h4 class="wc-title">
                        <a href="{{url('adm/usuarios')}}" class="text-white">
                            Usuários
                        </a>
                    </h4>
                    <span class="wc-des">
                        cadastrados
                    </span>
                    <span class="wc-stats counter">
                        {{$qtn_usuarios}}
                    </span>
                    <div class="progress wc-progress">
                        <div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="wc-progress-bx">
                        <span class="wc-change">
                            --
                        </span>
                        <span class="wc-number ml-auto">
                            --
                        </span>
                    </span>
                </div>
            </div>
        </div>

</div>

<div class="row">
    {{-- <div class="col-md-6"> --}}
    <div class="col-lg-6 m-b30">
        <div class="widget-box">
            <div class="wc-title">
                <h4>Usuários recentes</h4>
                <a href="{{url('adm/usuarios/create')}}" class="btn mb-2 mt-4">
                    <i class="fa-solid fa-user-plus"></i> Cadastrar Usuário
                </a>
            </div>
            <div class="widget-inner">
                <div class="new-user-list">
                    <ul>
                        @foreach ($usuarios as $usuario)
                        <li>
                            <span class="new-users-pic">
                                @if (!$usuario->image)
                                    <img src="{{asset('src/assets/images/user-avatar.png')}}" class="rounded-circle" width="25px" alt="">
                                @else
                                    <img src="{{asset($usuario->image)}}" class="rounded-circle" width="25px" alt="">

                                @endif
                            </span>
                            <span class="new-users-text">
                                <a href="{{route('usuarios.show', $usuario->id)}}" class="new-users-name">{{$usuario->name}} </a>
                                <span class="new-users-info">{{strtoupper($usuario->group)}} </span>
                            </span>
                            <span class="new-users-btn">
                                <a href="{{route('usuarios.show', $usuario->id)}}" class="btn button-sm outline">
                                    Ver
                                </a>
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<hr>

<!-- Áera do Calendário -->
<div class="row">
    <div class="col-lg-12 m-b30">
        <div class="container">
            <p>
                <h3>Eventos </h3>
                <a href="{{url('adm/listar_eventos')}}">
                    <i class="fa-solid fa-calendar-plus"></i> Gerenciar Eventos
                </a>
            </p>
            <div class="panel panel-primary">
                <div class="panel-heading">
                       Gerenciar Eventos
                </div>
                <div class="panel-body" >
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('modal')
    <!-- Modal Evento -->
    <div id="modalEvento" class="modal fade bd-example-modal-lg"
        tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12"><img class="event-image" src="" alt=""></div>
                    <div class="col-lg-12">
                        <p class="event-description"></p>
                        <p class="event-place"></p>
                        <p class="event-address"></p>
                    </div>
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
                    <hr/>
                    <div class="row">

                        <div class="col-lg-12 text-center">
                            <a href="{{url('adm/eventos')}}" class="btn ml-4">
                                <i class="fa-solid fa-calendar-days"></i> Gerenciar Eventos
                            </a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    $(document).ready(function () {
        var calendar = $('#calendar').fullCalendar({
            locale: 'pt-br',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            navLinks: true,
            editable: true,
            events: "{{url('adm/eventos')}}",
            displayEventTime: false,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Título do Evento:');
            if (title) {
                var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD');
                $.ajax({
                    url: "{{ URL::to('adm/criar_evento') }}",
                    data: 'title=' + title + '&start=' + start + '&end=' + end +'&_token=' +"{{ csrf_token() }}",
                    type: "post",
                    success: function (data) {
                        alert("Adicionado com sucesso!");
                        $('#calendar').fullCalendar('refetchEvents');
                    }
                });
            }
        },
        eventClick: function(event) {
            // Populate modal with event details
            $('#modalEvento .modal-title').text(event.title);
            $('#modalEvento .event-id').text(event.id);
            $('#modalEvento .event-description').text(event.description);
            $('#modalEvento .event-place').text(event.place);
            $('#modalEvento .event-address').text(event.address);
            $('#modalEvento .event-place').text(event.place);
            $('#modalEvento .event-image').attr('src', event.image);
            $('#modalEvento input[name="event-start"]').val(event.start.format('DD/MM/YYYY | HH:mm'));
            $('#modalEvento input[name="event-end"]').val(event.end.format('DD/MM/YYYY | HH:mm'));
            // Show the modal
            $('#modalEvento').modal('show');
        },
    });
    });
</script>
@endsection
