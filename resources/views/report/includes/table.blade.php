<div class="col-sm-12">
<table class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>email</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($userContas as $user)
        <tr>
            <td>{{ $user->cst_name }}</td>
            <td>{{ $user->cst_email }}</td>
            <td>
                @if($user->has_orders)
                    Aluno Matriculado
                @else
                    Não Finalizado
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>