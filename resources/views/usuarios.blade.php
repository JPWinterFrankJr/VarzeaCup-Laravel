<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            text-align: center;

        }

        #email {
            width: 400px;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
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
            <?php
            use App\Models\User;
            
            $results = User::all();
            if ($results->count() > 0) {
                foreach ($results as $result) {

                    echo '<tr>';
                    echo '<td>' . $result->id . '</td>';
                    echo '<td>' . $result->name . '</td>';
                    echo '<td>' . $result->email . '</td>';
                    echo '</tr>';
                }
            } else {
                echo "<tr><td colspan='3'>Nenhum usuário encontrado</td></tr>";
            }
            ?>
        </table>

    </div>
</body>

</html>