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

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Build Datatable -->
    <script src="{{ asset('assets/js/datatable.js') }}"></script>

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
                echo count($users);
                ?> usuários finalizaram o Processo',
            y: <?php  
                echo count($users);
                ?>,
            sliced: true,
            selected: true
            },  {
            name: '<?php  
                echo (count($users));
                ?> usuários não finalizaram',
            y: <?php  
                echo (count($users));
                ?>
            }]
        }]
        });
    </script>
@endpush

