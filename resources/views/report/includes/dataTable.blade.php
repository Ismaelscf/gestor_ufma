
<div class="col-sm-12">
<table id="dataTable" name="myTable" class="table table-striped" style="width:100%">
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
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if(!empty($user->customer->orders) && count($user->customer->orders)>0)
                    {{ $user->customer->orders[0]->ord_payload}}
                @else
                    Não Finalizado
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>