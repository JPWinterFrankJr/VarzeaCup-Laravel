<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
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
    
        $results = DB::table('vc_partidas')
        ->select('vc_partidas.id','t1.name as time1_nome', 't2.name as time2_nome', 
        'time1_gols1', 'time2_gols1', 'time1_gols2', 'time2_gols2')
            ->join('vc_times as t1','vc_partidas.time1_id', '=', 't1.id')
            ->join('vc_times as t2', 'vc_partidas.time2_id', '=', 't2.id')
            ->get();
        
    //$results = DB::select($partidas);

    return $results;
    } 


}








