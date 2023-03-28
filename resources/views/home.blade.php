@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card card-animate">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header m-0 p-2 bg-light">
                                <h4 class="text-success m-0">Bem Vindo ao Gestor!</h4>
                            </div>
                            <div class="card-body">
                                <figure class="highcharts-figure">
                                    <div id="container"></div>
                                    <p class="highcharts-description">
                                        <!-- Relação de usuários inscritos e usuários totais. -->
                                    </p>
                                </figure>

                                <div class="row">
                                    <h4 class="text-success m-0">Curso Formação de Preceptores da Educação em Saúde</h4>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-xs-12">
                                        
                                        <div class="small-box bg-blue">
                                            <div class="inner">
                                                <h3>{{ $dados->users }}</h3>
                                                <p>Usuários cadastrados no sistema</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-xs-6">
                                    
                                        <div class="small-box bg-green">
                                            <div class="inner">
                                                <h3>{{ $dados->aprovadosA1 }}</h3>
                                                <p>Usuários Aprovados - Atividade Avaliativa do Módulo 1</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-xs-6">
                                    
                                        <div class="small-box bg-red">
                                            <div class="inner">
                                                <h3>{{ $dados->reprovadosA1 }}</h3>
                                                <p>Usuários Reprovados - Atividade Avaliativa do Módulo 1</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-xs-6">
                                    
                                        <div class="small-box bg-gray">
                                            <div class="inner">
                                                <h3>{{ $dados->nAcessaram }}</h3>
                                                <p>Usuários que não acessaram - Atividade Avaliativa do Módulo 1</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xs-6">
                                    
                                        <div class="small-box bg-green">
                                            <div class="inner">
                                                <h3>{{ $dados->aprovadosR1 }}</h3>
                                                <p>Usuários Aprovados - Atividade de Recuperação do Módulo 1</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-xs-6">
                                    
                                        <div class="small-box bg-red">
                                            <div class="inner">
                                                <h3>{{ $dados->reprovadosR1 }}</h3>
                                                <p>Usuários Reprovados - Atividade  de Recuperação do Módulo 1</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- <div class="d-flex align-items-start gap-3 mt-4">
                                        <button type="submit" class="btn btn-success">Gerar PDF</button>
                                    </div> -->
                                </div>

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
            text: 'Relação Total de Usuários X Total de Inscritos (Contas)',
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
