<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Gestor UV</title>
    <style>
        .table {
            border: 1px solid #ccc;
            border-radius: 10px;
            border-collapse: separate;
            border-spacing: 0;
            font-family: 'Public Sans', sans-serif;
        }
        .table thead tr th {
            border-bottom: 0px;
            font-size: 16px;
        }
        .table tbody tr {
            border-bottom: 1px solid #ccc;
            margin-bottom: 30px;
        }
        .table tbody tr td {
            font-size: 12px;
            color: #555;
            text-align: center;
            border-left: 1px solid #ccc;
            padding: 15px 10px;
            border: 1px solid #ccc;
        }
        .table tbody tr td:first-of-type {
            border-left: none;
            width: 100px;
        }
        .table tbody tr:last-of-type td {
            border-bottom: none;
        }
        .table tbody tr:first-of-type td {
            border-top: 1px solid #ccc;
        }
        .table thead th {
            text-align: center;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        .table tbody tr:nth-child(even) {
            background-color: #eee;
        }
        .table tbody tr td#cod{
            width: 50px;
        }
        footer{
            bottom: 0;
            left: 0;
            right: 0;
            position: absolute;
            padding-top: 50px;
        }

        .tableListItems{
            font-size: 9px;
            text-align: justify;
        }

    
    </style>
</head>

<body>
    <img src="assets/report/top_relatorio.png" style="width: 100%;">
    <table class="table" style="margin-top: 50px; width:100%; margin-bottom: 20px">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Usuário</th>
                <th>Email</th>
                <th>Cidade</th>
                <th>Nota</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dados as $dado)
            <tr>
                <td>{{ $dado->firstname }}</td>
                <td>{{ $dado->lastname }}</td>
                <td>{{ $dado->username }}</td>
                <td>{{ $dado->email }}</td>
                <td>{{ $dado->city }}</td>
                <td>{{ $dado->lastname }}</td>
                <td>{{ $dado->highest_grade }}</td>
                <td>{{ $dado->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <footer>    
               <img src="assets/report/footer_relatorio.png" style="width: 100%;">
     </footer>
</body>

</html>