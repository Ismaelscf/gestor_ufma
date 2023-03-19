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

