@extends('layouts.edu')

@section('styles')
<link href="https://cdn.datatables.net/v/bs/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet"/>
@endsection


{{-- @section('conteudo') --}}
@section('content')

@include('itq._header_page')
<div class="section">
    <div class="container">
        <div class="table-responsive radius-md">
            <table id="ajaxTableResultados" class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-primary">Id</th>
                        <th class="text-primary">Ano</th>
                        <th class="text-primary">Região</th>
                        <th class="text-primary">Postulante</th>
                        <th class="text-primary">Prova</th>
                        <th class="text-primary">Redação</th>
                        <th class="text-primary">Média</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>
@endsection



@section('scripts')
<script src="https://cdn.datatables.net/v/bs/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
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
        $('#ajaxTableResultados').DataTable({
            // processing: true,
            // serverSide: true,

            "oLanguage": DATATABLE_PTBR,

            ajax: "{{url('postulantes/recupera_resultados_enaq')}}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'ano'
                },
                {
                    data: 'regiao'
                },
                {
                    data: 'nome'
                },
                {
                    data: 'prova'
                },
                {
                    data: 'redacao'
                },
                {
                    data: 'media'
                },
            ],
        });
    });
</script>
@endsection
