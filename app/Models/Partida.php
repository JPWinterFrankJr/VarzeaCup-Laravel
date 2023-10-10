<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Partida extends Model
{
    protected $table = 'vc_partidas'; // Nome da tabela correspondente no banco de dados
    protected $fillable = [
        'id', 
        'data_partida1', 
        'data_partida2',
        'time1_gols1', 
        'time2_gols1', 
        'time1_gols2',
        'time2_gols2', 
        'time1_id', 
        'time2_id'
    ]; // Campos que podem ser preenchidos em massa}

    //Função para listar partidas
    public function listarPartidas(){
    
     $sql = "SELECT p.id,p.data_partida1, p.data_partida2, t1.name AS time1_nome, t2.name AS time2_nome, 
        p.time1_gols1, p.time2_gols1, p.time1_gols2, p.time2_gols2
        FROM vc_partidas p
        INNER JOIN vc_times t1 ON p.time1_id = t1.id
        INNER JOIN vc_times t2 ON p.time2_id = t2.id";
    
    $results = DB::select($sql);

    return $results;
    } 


}








