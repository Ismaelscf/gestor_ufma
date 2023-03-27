@extends('layouts.app')
@section('title') Reports @endsection


@section('content')
<div class="col-md-12">
    <form action="{{ route('reports.report') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="course">Selecione o Curso</label>
            <select class="form-control" id="course" name="course">
                <option value="6" selected>Formação de Preceptores da Educação em Saúde</option>
            </select>
        </div>

        <div class="form-group">
            <label for="report">Selecione o tipo de Relatório</label>
            <select class="form-control" id="report" name="report">
                <option value="99">Relação de Alunos do Contas</option>
                <option value="1">Alunos Aprovados - Atividade Avaliativa do Módulo 1</option>
                <option value="2">Alunos Reprovados - Atividade Avaliativa do Módulo 1</option>
                <option value="3">Alunos que não acessaram - Atividade Avaliativa do Módulo 1</option>
                <option value="4">Alunos Aprovados - Atividade de Recuperação do Módulo 1</option>
                <option value="5">Alunos Reprovados - Atividade de Recuperação do Módulo 1</option>
                <option value="6">Alunos Aprovados - Atividade Avaliativa do Módulo 2</option>
                <option value="7">Alunos Reprovados - Atividade Avaliativa do Módulo 2</option>
                <option value="8">Alunos que não acessaram - Atividade Avaliativa do Módulo 2</option>
                <option value="9">Alunos Aprovados - Atividade de Recuperação do Módulo 2</option>
                <option value="10">Alunos Reprovados - Atividade de Recuperação do Módulo 2</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Selecionar</button>
    </form>
</div>
@endsection