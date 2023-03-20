@extends('layouts.app')
@section('title') Reports @endsection


@section('content')
    <div class="col-md-12">
        <div class="card card-animate">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header m-0 p-2 bg-light">
                                <h4 class="text-success m-0">Relatórios</h4>
                            </div>
                            <div class="card-body">
                                <figure class="highcharts-figure">
                                    <div id="container"></div>
                                    <p class="highcharts-description">
                                        Relação de usuários inscritos e usuários totais.
                                    </p>
                                </figure>
                                <!-- <div><canvas id="myChart" width="600" height="400"></canvas></div> -->
                                <form action="" method="post" id="form">
                                    <div class="row">
                                        @csrf
                                        @include('report.includes.table')
                                        <!-- <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="submit" class="btn btn-success">Gerar PDF</button>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-last')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.0.2/cleave.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#users-table').DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "language": {
        "lengthMenu": "Exibir _MENU_ resultados por página",
        "emptyTable": "Nenhum registro encontrado",
        "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 até 0 de 0 registros",
        "infoFiltered": "(Filtrados de _MAX_ registros)",
        "infoThousands": ".",
        "loadingRecords": "Carregando...",
        "processing": "Processando...",
        "zeroRecords": "Nenhum registro encontrado",
        "search": "Pesquisar",
        "paginate": {
            "next": "Próximo",
            "previous": "Anterior",
            "first": "Primeiro",
            "last": "Último"
        },
        "aria": {
            "sortAscending": ": Ordenar colunas de forma ascendente",
            "sortDescending": ": Ordenar colunas de forma descendente"
        },
        "buttons": {
            "copySuccess": {
                "1": "Uma linha copiada com sucesso",
                "_": "%d linhas copiadas com sucesso"
            },
            "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
            "colvis": "Visibilidade da Coluna",
            "colvisRestore": "Restaurar Visibilidade",
            "copy": "Copiar",
            "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
            "copyTitle": "Copiar para a Área de Transferência",
            "csv": "CSV",
            "excel": "Excel",
            "pageLength": {
                "-1": "Mostrar todos os registros",
                "_": "Mostrar %d registros"
            },
            "pdf": "PDF",
            "print": "Imprimir"
        },
        // url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json'
    },
                processing: true,
                serverSide: true,
                ajax: '{{ route('user.data') }}',
                columns: [
                    { data: 'cst_name', name: 'cst_name' },
                    { data: 'cst_email', name: 'cst_email' },
                    { 
                        data: 'has_orders', 
                        name: 'has_orders',
                        render: function(data) {
                            if (data == 1) {
                                return 'Matriculado';
                            } else {
                                return 'Não Matriculado';
                            }
                    }
                }
                ]
                
            });
        });
    </script>

    <script>
        // Data retrieved from https://netmarketshare.com/
        // Build the chart
        Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Relação Total de Usuários X Total de Inscritos',
            align: 'center'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
            valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
            }
        },
        series: [{
            name: 'Percentual',
            colorByPoint: true,
            data: [{
            name: '<?php  
                echo $nUsersRegistered;
                ?> usuários finalizaram o Processo',
            y: <?php  
                echo $nUsersRegistered;
                ?>,
            sliced: true,
            selected: true
            },  {
            name: '<?php  
                echo $nUsersUnregistered;
                ?> usuários não finalizaram',
            y: <?php  
                echo $nUsersUnregistered;
                ?>
            }]
        }]
        });
    </script>
@endpush

