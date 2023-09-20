@extends('layouts.adm')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
@endsection


{{-- @section('conteudo') --}}
@section('content')

{{-- @include('site._page-header') --}}
<div class="container">
    <a href="{{url('adm/notas/create')}}" class="btn mb-2 mt-4">
        <i class="fa fa-save"></i> Cadastrar Nota
    </a>
    <div class="table-responsive radius-md">
        <table id="ajaxTableRelatorios" class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-primary">Id</th>
                    <th class="text-primary">Aluno</th>
                    <th class="text-primary">Atividade</th>
                    <th class="text-primary">Nota</th>
                    <th class="text-primary">Ação</th>
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
            // processing: true,
            // serverSide: true,

            "oLanguage": DATATABLE_PTBR,

            ajax: "{{url('adm/notas')}}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'aluno'
                },
                {
                    data: 'nome'
                },
                {
                    data: 'nota'
                },
                {
                    data: 'acao'
                },
            ],
        });
    });
</script>
@endsection
