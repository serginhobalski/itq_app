@extends('layouts.adm')

@section('styles')
@endsection

@section('content')
<div class="container">
    <a href="{{url('adm/eventos/create')}}" class="btn mb-2 mt-4">
        <i class="fa fa-save"></i> Cadastrar Evento
    </a>
    <div class="table-responsive radius-md">
        <table id="ajaxTableRelatorios" class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-primary">Evento</th>
                    <th class="text-primary">Local</th>
                    <th class="text-primary">Início</th>
                    <th class="text-primary">Fim</th>
                    <th class="text-primary">Ações</th>
                </tr>
            </thead>

        </table>
    </div>
</div>


<!-- Área do Calendário -->
<div class="container"><p><h1>{{$titulo}} </h1></p>
    <div class="panel panel-primary">
        <div class="panel-heading">
               {{$subtitulo}}
        </div>
        <div class="panel-body" >
            <div id='calendar'></div>
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
        eventClick: function (event) {
            var deleteMsg = confirm("Deseja realmente deletar este evento?");
            if (deleteMsg) {
               $.ajax({
                    type: "POST",
                    type: "POST",
                    url: "{{ URL::to('detalhe_evento') }}",
                    data: "&id=" + event.id+'&_token=' +"{{ csrf_token() }}",
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            alert("Deletado com sucesso!");
                        }
                    }
                });
            }
        }
        });
    });
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
<script>
    const DATATABLE_PTBR = {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
        "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        },
        "select": {
            "rows": {
                "_": "Selecionado %d linhas",
                "0": "Nenhuma linha selecionada",
                "1": "Selecionado 1 linha"
            }
        }
    }

    $(document).ready(function() {
        $('#ajaxTableRelatorios').DataTable({
            // processing: true,
            // serverSide: true,

            "oLanguage": DATATABLE_PTBR,

            ajax: "{{url('adm/listar_eventos')}}",
            columns: [{
                    data: 'title'
                },
                {
                    data: 'place'
                },
                {
                    data: 'start'
                },
                {
                    data: 'end'
                },
                {
                    data: 'acoes'
                },
            ],
        });
    });
</script>
@endsection
