<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Partidas</title>
    <link rel="stylesheet" href="../css/tela_partidas.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .partida {
            display: block;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 700px;
            margin-left: 450px;
            margin-top: 30px;
        }

        .partida h2 {
            margin: 0;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
            text-align: center;
        }

        .info {
            margin: 10px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .info p {
            margin: 0;
        }

        .resultado {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
        }


        @media screen and (max-width: 600px) {
            .partida{
            display: block;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 330px;
            margin-left: 0px;
            margin-top: 30px;
            }
        }
    </style>
</head>

<body>
@include('navbar')
        <?php
        use Illuminate\Support\Facades\DB;
        use App\Models\Partidas;

        $sql = "SELECT p.data_partida1, p.data_partida2, t1.name AS time1_nome, t2.name AS time2_nome, 
                p.time1_gols1, p.time2_gols1, p.time1_gols2, p.time2_gols2
                FROM vc_partidas p
                INNER JOIN vc_times t1 ON p.time1_id = t1.id
                INNER JOIN vc_times t2 ON p.time2_id = t2.id";
                $names = DB::select($sql);

        foreach($names as $name){
            $time1 = $name->time1_nome;
            $time2 = $name->time2_nome;
        }

        $results = Partidas::all();
        foreach ($results as $result) {
            echo "<div class='partida'>";
            echo "<h1 id='nome'>{$time1} x {$time2}</h1> <br>";
            echo "<h2>Partida 1</h2>";
            echo "<div class='info'>";
            echo "<p>{$result->time1_nome} {$result->time1_gols1} X {$result->time2_gols1} {$result->time2_nome}</p>";
            echo "<form method='POST' action='" . route('salvar-partida') . "'>";?>
            @csrf
            <?php
            echo "<input type='hidden' name='partida_id' value='{$result->id}'>";
            echo "<input type='number' name='time1_gols1' value='{$result->time1_gols1}'>";
            echo "<input type='number' name='time2_gols1' value='{$result->time2_gols1}'>";
            
            echo "</div>";
                   // ...
                
            echo "<h2>Partida 2</h2>";
            echo "<div class='info'>";
            //Fazendo a busca do numero de gols por time da partida 2
            echo "<p>{$result->time1_nome} {$result->time1_gols2} X {$result->time2_gols2} {$result->time2_nome}</p>";
            // editar numero de gols
            echo "<input type='hidden' name='partida_id' value='{$result->id}'>";
            echo "<input type='number' name='time1_gols2' value='{$result->time1_gols2}'>";
            echo "<input type='number' name='time2_gols2' value='{$result->time2_gols2}'>";
            echo "<input type='submit' name='Salvar' value='Salvar'>"; 
         
            echo "</form>";
            echo "</div>";
            
            echo "</div>";

        }
   
        ?>

    </div>
</body>

</html>