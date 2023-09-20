@extends('layouts.adm')

@section('styles')
@endsection

@section('content')
<div class="container">
    <a href="{{url('adm/avisos/create')}}" class="btn mb-2 mt-4">
        <i class="fa fa-save"></i> Cadastrar Aviso
    </a>

    <div class="table-responsive radius-md">
        <table id="ajaxTableRelatorios" class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-primary">Aviso</th>
                    <th class="text-primary">Grupo</th>
                    <th class="text-primary">Data</th>
                    <th class="text-primary">Ações</th>
                </tr>
            </thead>

        </table>
    </div>
</div>
@endsection


@section('scripts')
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
            processing: true,
            serverSide: true,

            "oLanguage": DATATABLE_PTBR,

            ajax: "{{url('adm/listar_avisos')}}",
            columns: [{
                    data: 'titulo'
                },
                {
                    data: 'grupo'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'acoes'
                },
            ],
        });
    });
</script>
<script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })

</script>
@endsection
