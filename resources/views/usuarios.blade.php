<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <link rel="stylesheet" href="css/telas/usuarios.css">
</head>

<body>
    @include('navbar')


    <div class="container">
        <h1>Listagem de Usuários</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>


            @if ($results->count() > 0)
            @foreach ($results as $result)

            <tr>
                <td> {{$result->id}} </td>
                <td> {{$result->name}} </td>
                <td> {{$result->email}} </td>
            </tr>
            @endforeach

            @else
            <tr>
                <td colspan='3'>Nenhum usuário encontrado</td>
            </tr>

            @endif
        </table>

    </div>
</body>

</html>