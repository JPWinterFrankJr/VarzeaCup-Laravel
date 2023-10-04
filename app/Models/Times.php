<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Times extends Model
{
    protected $table = 'vc_times'; // Nome da tabela correspondente no banco de dados
    protected $fillable = [
        'id',
        'name'
    ]; // Campos que podem ser preenchidos em massa
    
    //Consulta para tela classificação
    /*public function classificacao($consulta){
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
    ->leftJoin('vc_partidas', function ($join) {
        $join->on('vc_times.id', '=', 'vc_partidas.time1_id')
            ->orOn('vc_times.id', '=', 'vc_partidas.time2_id');
    })->where(function ($query) {
        $query->whereNotNull('vc_partidas.time1_gols1')
            ->whereNotNull('vc_partidas.time1_gols2')
            ->orWhereNotNull('vc_partidas.time2_gols1')
            ->orWhereNotNull('vc_partidas.time2_gols2');
    })
    ->groupBy('vc_times.id', 'vc_times.name')
    ->orderByDesc('vitorias')
    ->get();


    }*/
}
