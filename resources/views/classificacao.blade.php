<?php

// Consulta para calcular a pontuação total de cada time (soma dos gols feitos)

use App\Models\Partidas;
use App\Models\Times;
use Illuminate\Support\Facades\DB;
// Substitua 'App\Time' pelo namespace correto do seu modelo de Time

$consulta = DB::table('vc_times')
    ->select('vc_times.id', 'vc_times.name', DB::raw('
        SUM(CASE 
            WHEN vc_partidas.time1_id = vc_times.id THEN vc_partidas.time1_gols1 + vc_partidas.time1_gols2
            ELSE vc_partidas.time2_gols1 + vc_partidas.time2_gols2
        END) AS gols
    '), DB::raw('
        COUNT(DISTINCT vc_partidas.id) AS jogos
    '), DB::raw('
        SUM(CASE 
            WHEN (vc_partidas.time1_id = vc_times.id AND (vc_partidas.time1_gols1 > vc_partidas.time2_gols1 OR vc_partidas.time1_gols2 > vc_partidas.time2_gols2)) OR
                 (vc_partidas.time2_id = vc_times.id AND (vc_partidas.time2_gols1 > vc_partidas.time1_gols1 OR vc_partidas.time2_gols2 > vc_partidas.time1_gols2))
                  THEN 1
            ELSE 0 
        END) AS vitorias
    '), DB::raw('
        SUM(CASE 
            WHEN (vc_partidas.time1_id = vc_times.id AND (vc_partidas.time1_gols1 < vc_partidas.time2_gols1 OR vc_partidas.time1_gols2 < vc_partidas.time2_gols2)) OR
                 (vc_partidas.time2_id = vc_times.id AND (vc_partidas.time2_gols1 < vc_partidas.time1_gols1 OR vc_partidas.time2_gols2 < vc_partidas.time1_gols2)) THEN 1
            ELSE 0 
        END) AS derrotas
    '), DB::raw('
        SUM(CASE 
            WHEN (vc_partidas.time1_id = vc_times.id AND ((vc_partidas.time1_gols1 = vc_partidas.time2_gols1 AND vc_partidas.time1_gols2 = vc_partidas.time2_gols2) OR (vc_partidas.time1_gols1 = vc_partidas.time2_gols2 AND vc_partidas.time1_gols2 = vc_partidas.time2_gols1))) OR
                 (vc_partidas.time2_id = vc_times.id AND ((vc_partidas.time2_gols1 = vc_partidas.time1_gols1 AND vc_partidas.time2_gols2 = vc_partidas.time1_gols2) OR (vc_partidas.time2_gols1 = vc_partidas.time1_gols2 AND vc_partidas.time2_gols2 = vc_partidas.time1_gols1))) THEN 1
            ELSE 0 
        END) AS empates
    '))
    ->leftJoin('vc_partidas', function($join) {
        $join->on('vc_times.id', '=', 'vc_partidas.time1_id')
             ->orOn('vc_times.id', '=', 'vc_partidas.time2_id');
    })    ->where(function ($query) {
        $query->whereNotNull('vc_partidas.time1_gols1')
            ->whereNotNull('vc_partidas.time1_gols2')
            ->orWhereNotNull('vc_partidas.time2_gols1')
            ->orWhereNotNull('vc_partidas.time2_gols2');
    })
    ->groupBy('vc_times.id', 'vc_times.name')
    ->orderByDesc('vitorias')
    ->get();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Classificação</title>
</head>

<body>

    <style>
        h1 {
            text-align: center;
        }

        td {
            width: 300px;
            height: 20px;
            text-align: center;
        }
    </style>
    </head>

    <body>
        @include('navbar')

        <h1>Tabela de Classificação</h1>

        <table border="1">
            <tr>
                <th>Posição</th>
                <th>Time</th>
                <th>Gols</th>
                <th>jogos</th>
                <th>Vitórias</th>
                <th>Derrotas</th>
                <th>Empates</th>
            </tr>
            <?php
            // Executar a consulta SQL
            
            $posicao = 1;
            
            foreach ($consulta as $result) {
                echo '<tr>';
                echo '<td>' . $posicao . '</td>';
                echo '<td>' . $result->name . '</td>';
                echo '<td>' . $result->gols . '</td>';
                echo '<td>' . $result->jogos . '</td>';
                echo '<td>' . $result->vitorias . '</td>';
                echo '<td>' . $result->derrotas . '</td>';
                echo '<td>' . $result->empates . '</td>';
                echo '</tr>';
                $posicao++;
            }
            ?>
        </table>
    </body>

</html>